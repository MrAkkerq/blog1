<?php

namespace App\Jobs;

use App\Models\Step;
use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CompletedTasksReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    public $timeout = 60;

    public $deleteWhenMissingModels = true;

    protected ?User $owner;

    public function retryUntil()
    {
        return now()->addSeconds(5);
    }

    public function __construct(User $user = null)
    {
        $this->owner = $user;
    }

    public function handle()
    {
//        throw new \Exception('Some Bug');

        $taskCount = Task::when(null !== $this->owner, function ($query) {
            $query->where('owner_id', $this->owner->id);
        })
            ->completed()
            ->count();

        $stepsCount = Step::when(null !== $this->owner, function ($query) {
            $query->whereHas('owner', function ($query) {
                 $query->where('users.id', '=', $this->owner->id);
            });
        })
            ->completed()
            ->count();

        echo ($this->owner ? $this->owner->name . ' ' : 'Всего: ') . "выполненных шагов: $stepsCount, Выполненных задач: $taskCount" . '<br>';
    }

    public function failed(\Exception $exception)
    {
        \Log::error($exception->getMessage());
    }
}

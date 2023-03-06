<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SayHello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:say_hello
        {users?* : Users}
        {--subject=Qq : Mail subject}
        {--c|class : Transform to Class name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Hello to User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $this->arguments();
//        $this->option();
//        $this->options();

        $users = $this->argument('users')
            ? \App\Models\User::findOrFail($this->argument('users'))
            : \App\Models\User::all()
        ;
        //dd($this->option('id'));
        $subject = $this->option('subject');

        if ($this->option('class')) {
            $subject = Str::studly($subject);
        }

        $users->map->notify(new \App\Notifications\SayHello($subject));

        $this->info('Notifications sent');
    }
}

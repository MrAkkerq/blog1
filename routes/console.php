<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

//Artisan::command('zzz:test', function (\App\Service\Pushall $pushall) {
//    dump($pushall);
//})->purpose('This is closure command');

Artisan::command('test', function () {
//    $name = $this->ask('What is your name?');
//    $password = $this->secret('And...What is your password?');
//    $this->info($name);
//    $this->info($password);
//    $this->line('Some text');
//    $this->info('Some test', 'vvv');
//    $this->comment('Some test');
//    $this->question('Some test');
//    $this->error('Some test');
//    if ($this->confirm('Are you already 18 years old?')) {
//        $this->info('Why are you cheating?!');
//    }
//    $name = $this->anticipate('What is your favorite food?', ['Potato', 'Meat', 'Wings of small magic dragons']);
//    $name = $this->choice('What is your favorite food?', ['Potato', 'Meat', 'Wings of small magic dragons']);
//
//    $this->info($name);
    $subject = $this->ask('Enter subject for email');

    $this->call('app:say_hello', [
        'users' => [1,2],
        '--subject' => $subject,
        '--class' => true
    ]);

//    $this->callSilent('app:say_hello', [
//        'users' => [1,2],
//        '--subject' => $subject,
//        '--class' => true
//    ]);

//    Artisan::call('app:say_hello', [
//        'users' => [1,2],
//        '--subject' => $subject,
//        '--class' => true
//    ]);
//
//    Artisan::output();
});

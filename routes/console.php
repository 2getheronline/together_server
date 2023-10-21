<?php

use App\Jobs\TerminateMissionsJob;
use App\Mission;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\User;

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

Artisan::command('manager', function () {

    User::whereIn('uid', [
        'FkrMzFe2iWNbikQ8J3f78k02Imn1',
        'wHr6VWoqUkWdafJTdsIf9FPbQzG2',
        'k4q3xLRR5Wc0vh9uAZzjh1Q8Who2'
    ])->update(['type' => 2]);
});


Artisan::command('outdated', function () {
    Mission::where("status", config("constants.status.active"))
            ->whereDate("deadlineDate", '<', date('Y-m-d'))
            ->update(["status" => config("constants.status.failed")]);
});

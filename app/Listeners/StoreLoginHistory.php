<?php

namespace App\Listeners;

use App\Events\UserAuthenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StoreLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(UserAuthenticated $event): void
    {
        DB::table('login_histories')->insert([
            'user' => $event->user->login,
            'login_time' => Carbon::now(),
        ]);
    }
}

<?php

namespace App\Listeners;

use App\Events\LogoutEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LogoutListener
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

    /**
     * Handle the event.
     *
     * @param  \App\Events\LogoutEvent  $event
     * @return void
     */
    public function handle(LogoutEvent $event)
    {
        $name = $event->name;
        $email = $event->email;
        $mobile = $event->mobile;
        $time = Carbon::now()->toDateTimeString();
        DB::table('logout_history')->insert([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'created_at' => $time,
            'updated_at' => $time,
        ]);
    }
}

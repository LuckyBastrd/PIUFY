<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Piutang;
use App\Mail\ReminderPiutangMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

// command default
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// 🔥 SCHEDULER REMINDER PIUTANG
Schedule::call(function () {

    $data = Piutang::where('status', '!=', 'lunas')->get();

    foreach ($data as $item) {

        $sisaHari = Carbon::now()
            ->diffInDays($item->tanggal_jatuh_tempo, false);

        if (in_array($sisaHari, [7, 5, 3])) {

            $users = User::all();

            foreach ($users as $user) {

                if ($user->email) {

                    Mail::to($user->email)
                        ->send(new ReminderPiutangMail($item, $sisaHari));
                }
            }
        }
    }

})->daily();
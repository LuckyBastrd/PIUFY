<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderPiutangMail extends Mailable
{
    use Queueable, SerializesModels;

    public $piutang;
    public $sisaHari;

    /**
     * Create a new message instance.
     */
    public function __construct($piutang, $sisaHari)
    {
        $this->piutang = $piutang;
        $this->sisaHari = $sisaHari;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // 🔥 SUBJECT DINAMIS
        $subject = "Pengingat Pembayaran";

        if ($this->sisaHari == 7) {
            $subject = "Reminder: 7 Hari Menuju Jatuh Tempo";
        } elseif ($this->sisaHari == 5) {
            $subject = "Reminder: 5 Hari Menuju Jatuh Tempo";
        } elseif ($this->sisaHari == 3) {
            $subject = "Reminder: 3 Hari Menuju Jatuh Tempo";
        }

        return $this->subject($subject)
            ->view('notifikasi')
            ->with([
                'piutang' => $this->piutang,
                'sisaHari' => $this->sisaHari
            ]);
    }
}
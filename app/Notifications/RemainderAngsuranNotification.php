<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Nerdify\SmsGateway\SmsGatewayChannel;
use Nerdify\SmsGateway\SmsGatewayMessage;;

class RemainderAngsuranNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($angsuran)
    {
        $this->angsuran = $angsuran;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmsGatewayChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSmsGateway($notifiable)
    {
        $user = $this->angsuran->user->fullName();

        $kode = $this->angsuran->kode;

        $content = "Sdr. $user Angsuran Pembayaran Anda Dengan $kode Telah Jatuh Tempo, Silahkan Lakukan Pembayaran!";
        
        return (new SmsGatewayMessage)->content($content);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

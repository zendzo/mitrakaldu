<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Nerdify\SmsGateway\SmsGatewayChannel;
use Nerdify\SmsGateway\SmsGatewayMessage;

use App\DocumentType;

class DocumentApprovedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($document)
    {
        $this->document = $document;
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
        $user = $this->document->user->fullName();

        $doc = DocumentType::findOrFail($this->document->document_type_id);

        $document_type = $doc->name;

        $content = "Sdr. $user Dokument $document_type Anda Telah Diverifikasi";
        
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

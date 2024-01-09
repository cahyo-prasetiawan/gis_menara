<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PesanNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $pesan;
    public function __construct($pesan)
    {
        $this->pesan = $pesan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'provider_id' => $this->pesan->provider_id,
            'pesan_id' => $this->pesan->id,
            'title' => 'Mengirimkan Laporan',
            'message' => $this->pesan->provider->name. ' Telah mengirimkan Laporan.',
            'url' => route('pesan.index')
        ];
    }
}

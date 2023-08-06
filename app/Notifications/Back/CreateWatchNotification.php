<?php

namespace App\Notifications\Back;

use App\Models\Watch;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateWatchNotification extends Notification
{
    use Queueable;

    public Watch $watch;

    /**
     * Create a new notification instance.
     */
    public function __construct(Watch $watch)
    {
        $this->watch = $watch;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting("Bonjour " . $notifiable->full_name . '!')
                    ->line("Une demande de personnalisation de  montre vient d'etre ajoutée sur le site par " . $this->watch->user->name)
                    ->action('Cliquez ici pour plus de détails', route('back.watch.edit', $this->watch))
                    ->line('Merci de traiter cette nouvelle commande');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    public $id_vacant;
    public $name_vacant;
    public $user_id;
    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacant, $name_vacant, $user_id)
    {
        $this->id_vacant = $id_vacant;
        $this->name_vacant = $name_vacant;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database']; //colocar database para saber que tiene que almacenarlo en la base de datos
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notification' . $this->id_vacant);
        return (new MailMessage)
            ->greeting('Hola')
            ->subject('Nuevo candidato en ' . $this->name_vacant)
            ->line('Hay un nuevo candadito')
            ->line('La vacante es: ' . $this->name_vacant)
            ->action('Ver notificaciones', $url)
            ->salutation('Gracias por utilizar Devjobs');
    }

    //almacena las notificaciones en la base de datos
    public function toDatabase($notifiable)
    {
        return [
            'id_vacant' => $this->id_vacant,
            'name_vacant' => $this->name_vacant,
            'user_id' => $this->user_id
        ];
    }
}

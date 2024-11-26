<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Str;

class VerificacionEmail extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Verificación de correo electrónico')
                    ->greeting('Hola ' . $notifiable->nombre)
                    ->line('Gracias por registrarte en nuestro sistema.')
                    ->line('Tu código de verificación es: ' . $this->token)
                    ->line('Por favor, ingresa este código en la página de verificación.')
                    ->action('Verificar Cuenta', url('/verificar-codigo/' . $this->token));
    }
}

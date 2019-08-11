<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailQueued extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return (new MailMessage)
            ->subject('Verifique seu endereço de email')
            ->line('Por favor clique no botão abaixo para verificar seu email.')
            ->action('Verificar Email', $verificationUrl)
            ->line('Se você não criou esse email, nenhuma ação é necessária.')
            ->markdown('mail.verificar.email');
    }
}

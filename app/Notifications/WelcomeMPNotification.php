<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeMPNotification extends Notification
{
    use Queueable;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
                    ->subject('Welcome to LegalConnect')
                    ->greeting('Hello ' . $this->user->username . ',')
                    ->line('Thank you for registering. We are excited to welcome you to the next generation of Medical Staffing.')
                    ->line("We offer opportunities for full time, Per Diem, and Travel Jobs for Nurses. We have just launched our grand opening in October 2021, while some jobs may be limited in certain areas, more and more jobs will become available every day. Please keep checking our website and don't forget to turn on notifications to receive emails when jobs are posted in the zip code of your choice!")
                    ->line('We are here for you with whatever you need. Reach out to us at any time!');
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
            'data' => 'Welcome to LegalConnect',
        ];
    }
}

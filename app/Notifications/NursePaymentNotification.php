<?php

namespace App\Notifications;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NursePaymentNotification extends Notification
{
    use Queueable;
    protected $nurse;
    protected $payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $nurse, Payment $payment)
    {
        $this->nurse   = $nurse;
        $this->payment = $payment;
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
                    ->subject('You have a received a payout')
                    ->greeting('Hello ' . $this->nurse->username . ',')
                    ->line('We will like to inform you that a payment of ' . $this->payment->amount . ' has just been made to you.');
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
            'data' => 'You have received a payout',
        ];
    }
}

<?php
namespace App\Notifications;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class MDPaymentNotification extends Notification
{
    use Queueable;
    protected $user;
    protected $payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Payment $payment)
    {
        $this->user    = $user;
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
        return ['mail'];
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
            ->subject('Legal Firm Payment Received')
            ->line('Your have received payment of ' . $this->payment->amount . ' from ' . $this->user->username);
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

<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentRequest extends Notification
{
    use Queueable;

    private Order $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
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
        return (new MailMessage)
            ->subject("Hello Container | Payment Request")
            ->greeting('Hi ' . $notifiable->name . ',')
            ->with(" ")
            ->line("Order ID: " . $this->order->id)
            ->line("BL Number: " . $this->order->bl_number)
            ->line("BL Release Date: " . $this->order->bl_release_date)
            ->line("BL User ID: " . $this->order->bl_release_user_id)
            ->line("BL User Name: " . $this->order->user->name)
            ->line("Freight Payer: " . ($this->order->freight_payer_self ? 'Yes' : 'No'))
            ->line("Contact Number: " . $this->order->contract_number)
            ->with(" ")
            ->line('Thank you for using our application!');
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

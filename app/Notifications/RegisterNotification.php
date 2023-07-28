<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class RegisterNotification extends Notification
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
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
        // Để dữ liệu được lưu lại trong db
        // return ['database'];
        // Để dữ liệu được trả về email
        // return ['mail'];
        // Để dữ liệu được trả về phone
        // return ['vonage'];
        // Để dữ liệu được trả về slack
        // return ['slack'];
        return ['database', 'mail', 'slack', 'vonage'];
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
            ->line('Xin chào: ' . $this->user->name)
            ->action('Notification Action', url('/'))
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
        // data này sẽ được lưu vào db
        return [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'mobile' => $this->user->mobile,
        ];
    }

    /**
     * Get the Vonage / SMS representation of the notification.
     */
    public function toVonage($notifiable)
    {
        return (new VonageMessage)
            ->content('Số điện thoại của bạn là: ' . $this->user->mobile);
    }

    /**
     * Get the Slack representation of the notification.
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->from('MAI THỊ THANH THÚY')
            ->image('https://media.licdn.com/dms/image/D5603AQHG5raebuCnBA/profile-displayphoto-shrink_800_800/0/1677594297140?e=1685577600&v=beta&t=xovJXAMUEArV5h-gPofiPQxwWsRXGzJOmAOS93WHyjI')
            ->content('Xin chào: ' . $this->user->name . ' Mình là Mai Thị Thanh Thúy');
    }
}

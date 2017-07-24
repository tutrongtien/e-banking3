<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user_name;
    protected $password;
    protected $link_active;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password, $linkActive)
    {
        $this->user_name = $user->user_name;
        $this->password = $password;
        $this->link_active = $linkActive;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registerUser')
                    ->with(['user_name' =>  $this->user_name,
                            'password' => $this->password,
                            'link_active' => $this->link_active ]);
    }
}

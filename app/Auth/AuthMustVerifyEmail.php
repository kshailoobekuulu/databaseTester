<?php


namespace App\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmail;

class AuthMustVerifyEmail extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }
}

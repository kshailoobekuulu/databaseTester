<?php


namespace App\Utility;
use Illuminate\Auth\Notifications\VerifyEmail as EmailVerification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class VerifyEmail extends EmailVerification
{
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('messages.VerifyEmailAddress'))
            ->line(Lang::get('messages.PleaseClickTheButtonBelowToVerifyYourEmailAddress'))
            ->action(Lang::get('messages.VerifyEmailAddressAction'), $url)
            ->line(Lang::get('messages.IfYouDidNotCreateAnAccountNoFurtherActionIsRequired'));
    }
}

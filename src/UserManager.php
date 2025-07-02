<?php
namespace App;
use App\models\User;

class UserManager
{

    public function __construct(private NotifierInterface $notifier) {}
    public function suspendUser(User $user): void
    {

        $user->suspend();
        $message = "Your account has been suspended.";
        $this->notifier->notify($user, $message);
    }
}
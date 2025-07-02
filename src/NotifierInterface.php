<?php

namespace App;

use App\models\User;

interface NotifierInterface
{
    public function notify(User $user, string $message): void;
}



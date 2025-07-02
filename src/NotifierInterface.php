<?php

namespace App;

use App\models\User;
// L'interface de la dépendance
interface NotifierInterface
{
    public function notify(User $user, string $message): void;
}



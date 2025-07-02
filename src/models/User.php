<?php

namespace App\models;

class User
{
    private bool $suspended = false;

    public function suspend(): void
    {
        $this->suspended = true;
    }

    public function isSuspended(): bool
    {
        return $this->suspended;
    }
}

<?php

namespace App;

class PasswordStrengthCalculator
{

    public function calculate(string $password): int
    {

        $score = 0;
        if (strlen($password) >= 8) {
            $score += 2;
        }
        if (preg_match('/[A-Z]/', $password)) {
            $score += 2;
        }
        if (preg_match('/[a-z]/', $password)) {
            $score += 2;
        }
        if (preg_match('/[0-9]/', $password)) {
            $score += 2;
        }
        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            $score += 2;
        }
        return min($score, 10);
    }
}

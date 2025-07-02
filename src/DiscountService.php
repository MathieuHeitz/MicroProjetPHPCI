<?php
namespace App;

class DiscountService
{
    public function applyDiscount(float $amount, float $percentage): float
    {
        if ($percentage < 0 || $percentage > 100) {
            throw new \InvalidArgumentException('Percentage must be between 0 and 100.');
        }
        return $amount * (1 - ($percentage / 100));
    }
}

<?php

namespace App;

use PHPUnit\Framework\TestCase;
use App\PasswordStrengthCalculator;

class PasswordStrengthCalculatorTest extends TestCase
{
    /**
     * @dataProvider passwordProvider
     */
    public function testCalculateScore(string $password, int $expectedScore)
    {
        $calculator = new PasswordStrengthCalculator();
        $this->assertEquals($expectedScore, $calculator->calculate($password));
    }

    public function passwordProvider(): array
    {
        return [
            ['', 0],

            ['faible', 2],

            ['moyennnn', 4],

            ['Fort%otdePasse68!', 10],

            ['12345678', 4],

            ['ABCDEFGH', 4],

            ['!+-//=)àç_çè_', 4],


        ];
    }
}

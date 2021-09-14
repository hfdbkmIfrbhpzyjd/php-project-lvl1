<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;

function gcd(int $a, int $b): int
{
    return ($a % $b) >= 1 ? gcd($b, $a % $b) : $b;
}

function roundGcd(): string
{
    $num1 = rand(0, 100);
    $num2 = rand(0, 100);
    $expected = gcd($num1, $num2);
    line('Question: ' . (string) $num1 . ' ' . (string) $num2);
    $answer = (int) prompt('Your answer: ');
    if ($expected === $answer) {
        return 'win';
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $expected);
        return 'lose';
    }
}

function game(int $numOfGames): string
{
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < $numOfGames; $i++) {
        $result = roundGcd();
        if ($result === 'win') {
            line('Correct!');
        } elseif ($result === 'lose') {
            return 'lose';
        }
    }
    return 'win';
}

<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

function isPrime(int $num): bool
{
    $check = true;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
             $check = false;
             break;
        }
    }
    return $check;
}

function roundPrime(): string
{
    $num = rand(2, 100);
    $expected = isPrime($num) ? 'yes' : 'no';
    line('Question: ' . (string) $num);
    $answer = prompt('Your answer: ');
    if ($expected === $answer) {
        return 'win';
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $expected);
        return 'lose';
    }
}

function game(int $numOfGames): string
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < $numOfGames; $i++) {
        $result = roundPrime();
        if ($result === 'win') {
            line('Correct!');
        } elseif ($result === 'lose') {
            return 'lose';
        }
    }
    return 'win';
}

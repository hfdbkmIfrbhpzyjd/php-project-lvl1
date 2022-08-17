<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function even(int $var): bool
{
    return ($var & 1) === 0 ? true : false;
}

function roundEven(): string
{
    $num = rand(0, 100);
    $expected = even($num) ? 'yes' : 'no';
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
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < $numOfGames; $i++) {
        $result = roundEven();
        if ($result === 'win') {
            line('Correct!');
        } elseif ($result === 'lose') {
            return 'lose';
        }
    }
    return 'win';
}

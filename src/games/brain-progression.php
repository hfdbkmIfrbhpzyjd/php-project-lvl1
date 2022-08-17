<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

function roundPr(): string
{
    $base = rand(0, 100);
    $step = rand(0, 100);
    $nums = rand(5, 10);
    $progression = [];
    for ($i = 0; $i < $nums; $i++) {
        $progression[] = $base + $step * $i;
    }
    $hiddenNum = rand(0, count($progression) - 1);
    $expected = $progression[$hiddenNum];
    $progression[$hiddenNum] = '..';
    line('Question: ' . implode(' ', $progression));
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
        $result = roundPr();
        if ($result === 'win') {
            line('Correct!');
        } elseif ($result === 'lose') {
            return 'lose';
        }
    }
    return 'win';
}

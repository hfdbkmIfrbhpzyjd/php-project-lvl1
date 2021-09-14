<?php

namespace Brain\Games\CalcFunc;

use function cli\line;
use function cli\prompt;

function calc($operation, $num1, $num2)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
            break;
        case '-':
            return $num1 - $num2;
            break;
        case '*':
            return $num1 * $num2;
            break;
    }
}

function roundCalc()
{
    $num1 = rand(0, 100);
    $num2 = rand(0, 100);
    $operations = ['*', '-', '+'];
    $operation = $operations[array_rand($operations)];
    $expected = calc($operation, $num1, $num2);
    line('Question: ' . (string) $num1 . $operation . (string) $num2);
    $answer = (int) prompt('Your answer: ');
    if ($expected === $answer) {
        return 'win';
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $expected);
        return 'lose';
    }
}

function game($numOfGames)
{
    line('What is the result of the expression?');
    for ($i = 0; $i < $numOfGames; $i++) {
        $result = roundCalc();
        if ($result === 'win') {
            line('Correct!');
        } elseif ($result === 'lose') {
            return 'lose';
        }
    }
    return 'win';
}

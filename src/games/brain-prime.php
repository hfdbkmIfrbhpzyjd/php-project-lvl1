<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

function isPrime($num)
{
    $check = True; 
    for ($i = 2; $i < $num; $i++)
    {
        if ($num % $i == 0) 
        {
             $check = False;
             break;
        }               
    }
   return $check;
}

function roundPrime()
{
    $num = rand(0, 100);
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

function game($numOfGames)
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

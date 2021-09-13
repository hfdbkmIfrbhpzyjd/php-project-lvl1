<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function greetings()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function result($res, $name)
{
    if ($res === 'win') {
        line('Congratulations, %s!', $name);
    } else if ($res === 'lose') {
        line('Let\'s try again, %s!', $name);
    }
}
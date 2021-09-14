<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;


function result($res, $name)
{
    if ($res === 'win') {
        line('Congratulations, %s!', $name);
    } elseif ($res === 'lose') {
        line('Let\'s try again, %s!', $name);
    }
}
<?php

namespace Brain\Games\Engine;

use function cli\line;

function result(string $res, string $name): void
{
    if ($res === 'win') {
        line('Congratulations, %s!', $name);
    } elseif ($res === 'lose') {
        line('Let\'s try again, %s!', $name);
    }
}

<?php

namespace PhpProject\GameEvan;

use function cli\line;
use function cli\prompt;

const MinNumber = 0;
const MaxNumber = 1000;
const RoundsQuantity = 3;

function isEven(int $number)
{
    return $number % 2 === 0;
}

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function GameEvan()
{
    $name = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 1; $i <= RoundsQuantity; $i += 1) 
    {
        $Number = rand(MinNumber,MaxNumber);
        line("Question: %s", $Number);
        $answer = prompt('Your answer');
        $result = isEven($Number) ? 'yes' : 'no';
        if ($answer == $result) {
            line("Correct!");
        } else {
            line ("'%s' is wrong answer ;(. Correct answer was '%s'. \nLet's try again, %s!",
            $answer, $result, $name);
            break;
        }
        line("Congratulations, %s", $name);
    }
}


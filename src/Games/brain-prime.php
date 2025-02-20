<?php

namespace PhpProject\GamePrime;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playRound;

const MinNumber = 0;
const MaxNumber = 100;
const RoundsQuantity = 3;
const Rules = '"yes" if given number is prime. Otherwise answer "no"';

function isPrime(int $Number)
{
    $array = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97);
    return in_array($Number,$array);
}

function genQuestionAndAnswer(): array
{
    $Number = rand(MinNumber, MaxNumber);
    return [(string) $Number, isPrime($Number) ? 'yes' : 'no'];
}

function GamePrime()
{
    $OneRound = [];
    for ($i = 1; $i <= RoundsQuantity; $i += 1) 
    {
        $OneRound[] = genQuestionAndAnswer();
    }
    playRound($OneRound, Rules);
}
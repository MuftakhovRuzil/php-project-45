<?php

namespace PhpProject\GameEven;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playRound;

const MinNumber = 0;
const MaxNumber = 1000;
const RoundsQuantity = 3;
const Rules = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $Number)
{
    return $Number % 2 === 0;
}

function genQuestionAndAnswer(): array
{
    $Number = rand(MinNumber, MaxNumber);
    return [(string) $Number, isEven($Number) ? 'yes' : 'no'];
}

function GameEven()
{
    $OneRound = [];
    for ($i = 1; $i <= RoundsQuantity; $i += 1) 
    {
        $OneRound[] = genQuestionAndAnswer();
    }
    playRound($OneRound, Rules);
}
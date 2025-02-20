<?php

namespace PhpProject\GameProgression;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playRound;

const MinNumber = 0;
const MaxNumber = 100;
const RoundsQuantity = 3;
const Rules = 'What number is missing in the progression?';
const MinQuantity = 5;
const MaxQuantity = 10;
const MinProgressionStep = 5;
const MaxProgressionStep = 10;


function getProgressionAnswer(array $Progression, int $pos)
{
    return $Progression[$pos];
}

function genQuestionAndAnswer(): array
{
    $ProgressionQuantity = rand(MinQuantity, MaxQuantity);
    $ProgressionStep = rand (MinProgressionStep, MaxProgressionStep);
    $Progression[0] = rand(MinNumber, MaxNumber);
    for ($i = 1; $i <= $ProgressionQuantity; $i += 1) 
    {
        $Progression[$i] = $Progression[$i-1] + $ProgressionStep;
    }
    $pos = rand(0,$ProgressionQuantity);
    $newProgression = $Progression;
    $newProgression[$pos] = '..';
    $Question = implode(' ',$newProgression);
    $answer = getProgressionAnswer($Progression,$pos);
    return [$Question, (string) $answer];
}

function FindProgression()
{
    $OneRound = [];
    for ($i = 1; $i <= RoundsQuantity; $i += 1) 
    {
        $OneRound[] = genQuestionAndAnswer();
    }
    playRound($OneRound, Rules);
}
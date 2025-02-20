<?php

namespace PhpProject\GameGCD;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playRound;

const MinNumber = 0;
const MaxNumber = 99;
const RoundsQuantity = 3;
const Rules = 'Find the greatest common divisor of given numbers.';

function rightGCD(int $FirstNumber, int $SecondNumber)
{
        while ($FirstNumber != $SecondNumber) {
            if ($FirstNumber > $SecondNumber) {
                $FirstNumber -= $SecondNumber;
            } else {
                $SecondNumber -= $FirstNumber;
            }
        }
        return $FirstNumber;
}

function genQuestionAndAnswer(): array
{
    $FirstNumber = rand(MinNumber, MaxNumber);
    $SecondNumber = rand(MinNumber, MaxNumber);
    $operatorsPull = ['+', '-', '*'];
    $Question = "{$FirstNumber} {$SecondNumber}";
    $answer = rightGCD($FirstNumber,$SecondNumber);
    return [$Question, (string) $answer];
}

function FindGCD()
{
    $OneRound = [];
    for ($i = 1; $i <= RoundsQuantity; $i += 1) 
    {
        $OneRound[] = genQuestionAndAnswer();
    }
    playRound($OneRound, Rules);
}
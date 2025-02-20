<?php

namespace PhpProject\GameCalc;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playRound;

const MinNumber = 0; // Минимальное число
const MaxNumber = 99; // Максимальное число
const RoundsQuantity = 3; // Количество раундов
const Rules = 'What is the result of the expression?'; //Правила игры

function calcRight(int $FirstNumber, string $operator, int $SecondNumber)
{
    if ($operator == '*') {
        $result = $FirstNumber * $SecondNumber;
        return $result;
    } elseif ($operator == '+') {
        $result = $FirstNumber + $SecondNumber;
        return $result;
    } else {
        $result = $FirstNumber - $SecondNumber;
        return $result;
    }
}

function genQuestionAndAnswer(): array
{
    $FirstNumber = rand(MinNumber, MaxNumber);
    $SecondNumber = rand(MinNumber, MaxNumber);
    $operatorsPull = ['+', '-', '*'];
    $operator = $operatorsPull[array_rand($operatorsPull)];
    $Question = "{$FirstNumber} {$operator} {$SecondNumber}";
    $answer = calcRight($FirstNumber,$operator,$SecondNumber);
    return [$Question, (string) $answer];
}

function CalculateThis()
{
    $OneRound = [];
    for ($i = 1; $i <= RoundsQuantity; $i += 1) 
    {
        $OneRound[] = genQuestionAndAnswer();
    }
    playRound($OneRound, Rules);
}
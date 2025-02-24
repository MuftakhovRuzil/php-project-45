<?php

//ИГРА КАЛЬКУЛЯТОР

namespace PhpProject\GameCalc;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playGame;

const MINNUMBER = 0; // Минимальное число
const MAXNUMBER = 99; // Максимальное число
const ROUNDSQUANTITY = 3; // Количество раундов
const RULES = 'What is the result of the expression?'; //Правила игры

// Функция которая вычисляет правильный ответ случайно сгенерированного выражения

function calcRight(int $firstNumber, string $operator, int $secondNumber)
{
    if ($operator == '*') {
        $result = $firstNumber * $secondNumber;
        return $result;
    } elseif ($operator == '+') {
        $result = $firstNumber + $secondNumber;
        return $result;
    } else {
        $result = $firstNumber - $secondNumber;
        return $result;
    }
}

// Функция которая формирует выражение которое нужно вычислить

function genQuestionAndAnswer(): array
{
    $firstNumber = rand(MINNUMBER, MAXNUMBER);
    $secondNumber = rand(MINNUMBER, MAXNUMBER);
    $operatorsPull = ['+', '-', '*'];
    $operator = $operatorsPull[array_rand($operatorsPull)];
    $question = "{$firstNumber} {$operator} {$secondNumber}";
    $answer = calcRight($firstNumber, $operator, $secondNumber);
    return [$question, (string) $answer];
}

// функция которая формирует массив из 3 вопрос+верный ответ, и запускает движок игры
function calculateThis()
{
    $oneRound = [];
    for ($i = 1; $i <= ROUNDSQUANTITY; $i += 1) {
        $oneRound[] = genQuestionAndAnswer();
    }
    playGame($oneRound, RULES);
}

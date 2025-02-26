<?php

//ИГРА КАЛЬКУЛЯТОР

namespace Php\Project\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\playGame;

const MINNUMBER = 0; // Минимальное число
const MAXNUMBER = 99; // Максимальное число
use const Php\Project\Engine\ROUNDS_COUNT; // Количество раундов
const RULES = 'What is the result of the expression?'; //Правила игры

// Функция которая вычисляет правильный ответ случайно сгенерированного выражения

function calc(int $firstNumber, string $randomOperator, int $secondNumber)
{
    switch ($randomOperator) {
        case '*': // status == processing
            $result = $firstNumber * $secondNumber;
            break;
        case '+': // status == paid
            $result = $firstNumber + $secondNumber;
            break;
        default: // else
            $result = $firstNumber - $secondNumber;
    }
    return $result;

}

// Функция которая формирует выражение которое нужно вычислить

function genQNA(): array
{
    $firstNumber = rand(MINNUMBER, MAXNUMBER);
    $secondNumber = rand(MINNUMBER, MAXNUMBER);
    $operators = ['+', '-', '*'];
    $randomOperator = $operators[array_rand($operators)];
    $question = "{$firstNumber} {$randomOperator} {$secondNumber}";
    $answer = calc($firstNumber, $randomOperator, $secondNumber);
    return [$question, (string) $answer];
}

// функция которая формирует массив из 3 вопрос+верный ответ, и запускает движок игры

function calculateThis()
{
    $gameDatabase = [];
    for ($i = 1; $i <= ROUNDS_COUNT; $i += 1) {
        $gameDatabase[] = genQNA();
    }
    playGame($gameDatabase, RULES);
}

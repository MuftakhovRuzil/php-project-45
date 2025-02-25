<?php

//ИГРА ПО НАХОЖДЕНИЮ НОД

namespace PhpProject\GameGCD;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playGame;

const MINNUMBER = 1; // Минимальное число
const MAXNUMBER = 99; // Максимальное число
const ROUNDSQUANTITY = 3; // Количество раундов
const RULES = 'Find the greatest common divisor of given numbers.'; //Правила игры

/**
* Функция которая определяет НОД двух чисел по алгоритму Евклида, сравнение двух чисел,
* от большого отнимается меньшее пока они не станут равны
*/

function rightGCD(int $firstNumber, int $secondNumber)
{
    while ($firstNumber != $secondNumber) {
        if ($firstNumber > $secondNumber) {
                $firstNumber -= $secondNumber;
        } else {
                $secondNumber -= $firstNumber;
        }
    }
        return $firstNumber;
}
/**
* Функция которая формирует один вопрос в виде строки из двух случайных чисел
* далее по функции выше в массив передается ответ из функции rightGCD и
* объединяется с вопросом в массиве
*/

function genQuestionAndAnswer(): array
{
    $firstNumber = rand(MINNUMBER, MAXNUMBER);
    $secondNumber = rand(MINNUMBER, MAXNUMBER);
    $Question = "{$firstNumber}make  {$secondNumber}";
    $answer = rightGCD($firstNumber, $secondNumber);
    return [$Question, (string) $answer];
}

// функция которая формирует массив из 3 вопрос+верный ответ, и запускает движок игры

function FindGCD()
{
    $oneRound = [];
    for ($i = 1; $i <= ROUNDSQUANTITY; $i += 1) {
        $oneRound[] = genQuestionAndAnswer();
    }
    playGame($oneRound, RULES);
}

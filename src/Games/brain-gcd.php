<?php

namespace PhpProject\GameGCD;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playRound;

const MinNumber = 0; // Минимальное число
const MaxNumber = 99; // Максимальное число
const RoundsQuantity = 3; // Количество раундов
const Rules = 'Find the greatest common divisor of given numbers.'; //Правила игры

/* Функция которая определяет НОД двух чисел по алгоритму Евклида, сравнение двух чисел, 
от большого отнимается меньшее пока они не станут равны */
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
/* Функция которая формирует один вопрос в виде строки из двух случайных чисел
далее по функции выше в массив передается ответ из функции rightGCD и
объединяется с вопросом в массиве*/
function genQuestionAndAnswer(): array
{
    $FirstNumber = rand(MinNumber, MaxNumber);
    $SecondNumber = rand(MinNumber, MaxNumber);
    $Question = "{$FirstNumber} {$SecondNumber}";
    $answer = rightGCD($FirstNumber,$SecondNumber);
    return [$Question, (string) $answer];
}

/* Функция которая формирует массив из 3 вопросов и ответов, затем запускает основной движок игры*/
function FindGCD()
{
    $OneRound = [];
    for ($i = 1; $i <= RoundsQuantity; $i += 1) 
    {
        $OneRound[] = genQuestionAndAnswer();
    }
    playRound($OneRound, Rules);
}
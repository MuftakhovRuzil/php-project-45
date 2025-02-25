<?php

//ИГРА ПО ОПРЕДЕЛНИЮ ЧЕТНОСТИ ЧИСЛА

namespace PhpProject\GameEven;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playGame;

const MINNUMBER = 0; // Минимальное число
const MAXNUMBER = 99; // Максимальное число
const ROUNDSQUANTITY = 3; // Количество раундов
const RULES = 'Answer "yes" if the number is even, otherwise answer "no".'; //Правила игры

/* Функция определения четности числа*/
function isEven(int $number)
{
    return $number % 2 === 0;
}

/* Функция генерации случайного числа и правильного ответа*/
function genQuestionAndAnswer(): array
{
    $number = rand(MINNUMBER, MAXNUMBER);
    return [(string) $number, isEven($number) ? 'yes' : 'no'];
}

// функция которая формирует массив из 3 вопрос+верный ответ, и запускает движок игры

function gameEven()
{
    $oneRound = [];
    for ($i = 1; $i <= ROUNDSQUANTITY; $i += 1) {
        $oneRound[] = genQuestionAndAnswer();
    }
    playGame($oneRound, RULES);
}

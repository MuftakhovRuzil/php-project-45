<?php

//ИГРА ПО ОПРЕДЕЛНИЮ ЧЕТНОСТИ ЧИСЛА

namespace Php\Project\Games\Even;

use function cli\prompt;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\playGame;

const MINNUMBER = 0; // Минимальное число
const MAXNUMBER = 99; // Максимальное число
use const Php\Project\Engine\ROUNDS_COUNT; // Количество раундов
const RULES = 'Answer "yes" if the number is even, otherwise answer "no".'; //Правила игры

/* Функция определения четности числа*/
function isEven(int $number)
{
    return $number % 2 === 0;
}

/* Функция генерации случайного числа и правильного ответа*/
function genQNA(): array
{
    $number = rand(MINNUMBER, MAXNUMBER);
    return [(string) $number, isEven($number) ? 'yes' : 'no'];
}

// функция которая формирует массив из 3 вопрос+верный ответ, и запускает движок игры

function gameEven()
{
    $gameDatabase = [];
    for ($i = 1; $i <= ROUNDS_COUNT; $i += 1) {
        $gameDatabase[] = genQNA();
    }
    playGame($gameDatabase, RULES);
}

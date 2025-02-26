<?php

//ИГРА ПО ОПРЕДЕЛНИЮ ПРОСТОГО ЧИСЛА

namespace Php\Project\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\playGame;

const MINNUMBER = 0; // Минимальное число
const MAXNUMBER = 99; // Максимальное число
use const Php\Project\Engine\ROUNDS_COUNT; // Количество раундов
const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';  //Правила игры

function isPrime(int $number)
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function genQNA(): array
{
    $number = rand(MINNUMBER, MAXNUMBER);
    return [(string) $number, isPrime($number) ? 'yes' : 'no'];
}

// функция которая формирует массив из 3 вопрос+верный ответ, и запускает движок игры

function gamePrime()
{
    $gameDatabase = [];
    for ($i = 1; $i <= ROUNDS_COUNT; $i += 1) {
        $gameDatabase[] = genQNA();
    }
    playGame($gameDatabase, RULES);
}

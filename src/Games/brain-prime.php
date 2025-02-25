<?php

//ИГРА ПО ОПРЕДЕЛНИЮ ПРОСТОГО ЧИСЛА

namespace PhpProject\GamePrime;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playGame;

const MINNUMBER = 0; // Минимальное число
const MAXNUMBER = 99; // Максимальное число
const ROUNDSQUANTITY = 3; // Количество раундов
const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';  //Правила игры

function isPrime(int $number)
{
    $array = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97);
    return in_array($number, $array, false);
}

function genQuestionAndAnswer(): array
{
    $number = rand(MINNUMBER, MAXNUMBER);
    return [(string) $number, isPrime($number) ? 'yes' : 'no'];
}

// функция которая формирует массив из 3 вопрос+верный ответ, и запускает движок игры

function gamePrime()
{
    $oneRound = [];
    for ($i = 1; $i <= ROUNDSQUANTITY; $i += 1) {
        $oneRound[] = genQuestionAndAnswer();
    }
    playGame($oneRound, RULES);
}

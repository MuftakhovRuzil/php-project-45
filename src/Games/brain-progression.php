<?php

//ИГРА НАЙДИ ПРОПУЩЕННУЮ ЦИФРУ В ПРОГРЕССИИ

namespace PhpProject\GameProgression;

use function cli\line;
use function cli\prompt;
use function PhpProject\Engine\greeting;
use function PhpProject\Engine\playGame;

const MINNUMBER = 0; // Минимальное число
const MAXNUMBER = 99; // Максимальное число
const ROUNDSQUANTITY = 3; // Количество раундов
const RULES = 'What number is missing in the progression?';  //Правила игры
const MINQUANTITY = 5; // Мин количество цифр в среды которых образуется прогрессия
const MAXQUANTITY = 10; // Макс количество цифр в среды которых образуется прогрессия
const MINPROGRESSIONSTEP = 5; //Мин шаг прогрессии
const MAXPROGRESSIONSTEP = 10; //Макс шаг прогрессии

/* Функция верного ответа, заранее опеределенная позиция в массиве*/
function getProgressionAnswer(array $Progression, int $pos)
{
    return $Progression[$pos];
}

/**
 * Функция генерации массива с вопросом в виде прогрессии где одна позиция
 * пропущена и с ответом
*/
function genQuestionAndAnswer(): array
{
    $progressionQuantity = rand(MINQUANTITY, MAXQUANTITY); // определили количество цифр из которых посторена прогрессия
    $progressionStep = rand(MINPROGRESSIONSTEP, MAXPROGRESSIONSTEP); // определили шаг прогрессии
    $progression[0] = rand(MINNUMBER, MAXNUMBER); //начальная цифра с которой набирается прогрессия
    for ($i = 1; $i <= $progressionQuantity; $i += 1) {
        $progression[$i] = $progression[$i - 1] + $progressionStep;
    }
    $pos = rand(0, $progressionQuantity); // определяем какая позиция будет исключена
    $newProgression = $progression; // формируем массив вопроса с исключенной позицией
    $newProgression[$pos] = '..';
    $question = implode(' ', $newProgression); // записываем массив с цифрами в строку
    $answer = getProgressionAnswer($progression, $pos);
    return [$question, (string) $answer];
}

// функция которая формирует массив из 3 вопрос+верный ответ, и запускает движок игры

function findProgression()
{
    $oneRound = [];
    for ($i = 1; $i <= ROUNDSQUANTITY; $i += 1) {
        $oneRound[] = genQuestionAndAnswer();
    }
    playGame($oneRound, RULES);
}

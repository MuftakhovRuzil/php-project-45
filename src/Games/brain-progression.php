<?php

//ИГРА НАЙДИ ПРОПУЩЕННУЮ ЦИФРУ В ПРОГРЕССИИ

namespace Php\Project\Games\progression;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\playGame;

const MINNUMBER = 0; // Минимальное число
const MAXNUMBER = 99; // Максимальное число
use const Php\Project\Engine\ROUNDS_COUNT; // Количество раундов
const RULES = 'What number is missing in the progression?';  //Правила игры
const MIN_COUNT = 5; // Мин количество цифр в среды которых образуется прогрессия
const MAX_COUNT = 10; // Макс количество цифр в среды которых образуется прогрессия
const MINPROGRESSIONSTEP = 5; //Мин шаг прогрессии
const MAXPROGRESSIONSTEP = 10; //Макс шаг прогрессии

/* Функция верного ответа, заранее опеределенная позиция в массиве*/
function getProgressionAnswer(array $progression, int $pos)
{
    return $progression[$pos];
}

/* Функция генерации массива исходя из условий (Начальное число, Кол-во шагов, Величина шага) */
function genProgression(int $firstPos, int $progressionCount, int $progressionStep): array
{
    $progression = [];
    $progression[0] = $firstPos;
    for ($i = 1; $i <= $progressionCount; $i += 1) {
        $progression[$i] = $progression[$i - 1] + $progressionStep;
    }
    return $progression;
}
/**
 * Функция генерации массива с вопросом в виде прогрессии где одна позиция
 * пропущена и с ответом
*/
function genQNA(): array
{
    $progressionCount = rand(MIN_COUNT, MAX_COUNT); // определили количество чисел из которых посторена прогрессия
    $progressionStep = rand(MINPROGRESSIONSTEP, MAXPROGRESSIONSTEP); // определили шаг прогрессии
    $firstPos = rand(MINNUMBER, MAXNUMBER); //начальная цифра с которой набирается прогрессия
    $progression = genProgression($firstPos, $progressionCount, $progressionStep);
    $pos = rand(0, $progressionCount - 1); // определяем какая позиция будет исключена
    $newProgression = $progression; // формируем массив вопроса с исключенной позицией
    $newProgression[$pos] = '..';
    $question = implode(' ', $newProgression); // записываем массив с числами в строку
    $answer = getProgressionAnswer($progression, $pos);
    return [$question, (string) $answer];
}

// функция которая формирует массив из 3 вопрос+верный ответ, и запускает движок игры

function findProgression()
{
    $gameDatabase = [];
    for ($i = 1; $i <= ROUNDS_COUNT; $i += 1) {
        $gameDatabase[] = genQNA();
    }
    playGame($gameDatabase, RULES);
}

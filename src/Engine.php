<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

/* Простая функция приветсвия пользователя*/

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
/** Функция которая задает вопрос пользователю и записывает ответ
* Сам вопрос поступает от функций папки src/Games
*/

function askQuestion(string $question): string
{
    line('Question: %s', $question);
    $answer = prompt('Your answer');
    return $answer;
}

/** Основная функция проекта
*/

function playGame(array $oneRound, string $rules): void
{
    $name = greeting();
    line($rules);  // Показывает правила в зависимости от запущенной игры
    for ($i = 1; $i <= ROUNDS_COUNT; $i += 1) { // количество раундов
        list($question, $correctAnswer) = $oneRound[$i - 1]; // формирует переменные из ячейки массива
        $answer = askQuestion($question); // ответ из функции которая задает вопрос пользователю
        if ($answer !== $correctAnswer) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'. \nLet's try again, %s!",
                $answer,
                $correctAnswer,
                $name
            );
            return; // если неверный ответ то игра завершается полностью
        } else {
            line('Correct!');
        }
    }
    line('Congratulations, %s!', $name);
}

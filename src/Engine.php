<?php
namespace PhpProject\Engine;

use function cli\line;
use function cli\prompt;

const MinNumber = 0;
const MaxNumber = 1000;
const RoundsQuantity = 3;

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function askQuestion(string $question): string//функция запроса ответа на вопрос
{
    line('Question: %s', $question);
    $answer = prompt('Your answer');
    return $answer;
}
// ниже главная функция движка
function playRound(array $OneRound, string $Rules): void
{
    $name = greeting();
    line($Rules); // Выводим правила один раз перед началом игры
    for ($i = 1; $i <= RoundsQuantity; $i += 1) {
        list($question, $correctAnswer) = $OneRound[$i-1];
        $answer = askQuestion($question);
        // Сравниваем ответ пользователя с правильным ответом
        if ($answer !== $correctAnswer) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'. \nLet's try again, %s!",
                $answer,
                $correctAnswer,
                $name
            );
            return;
        } else {
            line('Correct!');
        }
    }
    line('Congratulations, %s!', $name); // вывод, если выиграл все раунды
}
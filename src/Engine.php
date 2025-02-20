<?php
namespace PhpProject\Engine;

use function cli\line;
use function cli\prompt;


/* Простая функция приветсвия пользователя*/
function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
/* Простая функция которая задает вопрос пользователю и записывает ответ
Сам вопрос поступает от функций папки src/Games*/
function askQuestion(string $question): string
{
    line('Question: %s', $question);
    $answer = prompt('Your answer');
    return $answer;
}

function playRound(array $OneRound, string $Rules): void
{
    $name = greeting();
    line($Rules); 
    for ($i = 1; $i <= RoundsQuantity; $i += 1) {
        list($question, $correctAnswer) = $OneRound[$i-1];
        $answer = askQuestion($question);
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
    line('Congratulations, %s!', $name); 
}
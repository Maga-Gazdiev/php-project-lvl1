<?php

namespace step\sixth;

use function cli\line;
use function cli\prompt;

function onParity(int $a, int $b, string $name): string
{
    $result = "";
    if ($a == $b) {
        $result = ('Correct!');
    } elseif ($a !== $b) {
        die("'$b' is wrong answer :( Correct answer was '$a'.\nLet's try again, $name!");
    }
    return $result;
}
function sixthStep(): void
{
    line("Welcome to the Brain Games!");
    $name = (prompt('May I Have your name?'));
    line("Hello, {$name}!");
    line('What is the result of the expression?');
    $signs = ['-', '+', '*'];
    $win = [];
    for ($i = 0; $i < 3; $i++) {
        $randIndex = array_rand($signs, 1);
        $randOperation = $signs[$randIndex];
        $randNum1 = rand(1, 20);
        $randNum2 = rand(1, 20);
        if ($randOperation === '+') {
            $correctAnswer = $randNum1 + $randNum2;
        } elseif ($randOperation === '-') {
            $correctAnswer = $randNum1 - $randNum2;
        } else {
            $correctAnswer = $randNum1 * $randNum2;
        }
        $question = ("Question: {$randNum1} {$randOperation} {$randNum2}");
        line($question);
        $answer = (prompt("Your answer"));
        $inAnswer = onParity((int)$answer, $correctAnswer, $name);
        line($inAnswer);
        $win[] = $inAnswer[$i];
        if (count($win) === 3) {
            line("Congratulations, $name!");
        }
    }
}

<?php

namespace fifth\step;

use function cli\line;
use function cli\prompt;

function onParity(int $number1, string $answer, string $name): string
{
     $result = '';
    if (($number1 % 2) === 0 && $answer === 'yes' || ($number1 % 2) !== 0 && $answer === 'no') {
        $result = ('correct');
    } elseif (($number1 % 2) !== 0 && $answer === 'yes' || ($number1 % 2) === 0 && $answer === 'no') {
        die("Let's try again, $name!");
    }
    return $result;
}
function fifthStep(): void
{
     line("Welcome to the Brain Games!");
     $name = prompt('May I Have your name?');
     line("Hello, {$name}!");
     line('Answer "yes" if the number is even, otherwise answer "no"');
    for ($i = 0; $i < 3; $i++) {
         $result = [];
         $number = rand(0, 100);
         $result[] = ("Question: $number");
         line(implode($result));
         $result2 = prompt("Your answer");
         $norm = (onParity($number, $result2, $name));
         line($norm);
         $win[] = $norm[$i];
        if (count($win) === 3) {
             line("Congratulations, {$name}!");
        }
    }
}

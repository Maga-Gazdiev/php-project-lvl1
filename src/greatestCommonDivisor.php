<?php

namespace seven\step;

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
function gcd(int $a, int $b): int|bool
{
    $range = range(0, $a);
    $range1 = range(0, $b);
    $allDivi = [];
    $allDivi1 = [];
    for ($i = 1; $i <= count($range) - 1; $i++) {
        $mn = ($a / $range[$i]);
        if (is_int($mn)) {
            $allDivi[] = $mn;
        }
    }
    for ($i = 1; $i <= count($range1) - 1; $i++) {
        $mm = ($b / $range1[$i]);
        if (is_int($mm)) {
            $allDivi1[] = $mm;
        }
    }
    $commonDivisors = array_intersect($allDivi, $allDivi1);
    return (max($commonDivisors));
}

function seventhStep(): void
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I Have your name?');
    line("Hello, {$name}!");
    line('Find the greatest common divisor of given numbers.');
    $win = [];
    for ($i = 0; $i < 3; $i++) {
        $num1 = rand(20, 30);
        $num2 = rand(20, 30);
        $question = [];
        $question = ("Question: $num1 $num2");
        line($question);
        $answer = prompt("Your answer");
        $mm = gcd($num1, $num2);
        $norm = onParity((int) $mm, (int)$answer, $name);
        line("$norm");
            $win[] = $norm[$i];
        if (count($win) === 3) {
            line("Congratulations, $name!");
        }
    }
}

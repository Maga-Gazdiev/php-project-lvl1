<?php

namespace seven\step;

use function cli\line;
use function cli\prompt;

function onPari($a, $b)
{
  if ($a == $b) {
    return ("correct");
  } elseif ($a !== $b) {
    die("'$b' is wrong answer :( Correct answer was '$a'.\nLet's try again");
  }
}
function seventhStep()
{
  line("Welcome to the Brain Games!");
  $name = prompt('May I Have your name?');
  line("Hello, {$name}!");
  line('Find the greatest common divisor of given numbers.');
  for ($i = 0; $i < 3; $i++) {
    $num1 = rand(20, 30);
    $num2 = rand(20, 30);
    $question = [];
    $question = ("Question: $num1 $num2");
    line($question);
    $answer = prompt("Your answer");
    $mm = gmp_gcd($num1, $num2);
    $norm = onPari($mm, $answer);
    line("$norm");
    if ($norm === "correct") {
      $win[] = $norm[$i];
      if (count($win) === 3) {
        line("Congratulations, $name!");
      }
    }
  }
}

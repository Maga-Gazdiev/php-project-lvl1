<?php

namespace step\sixth;

use function cli\line;
use function cli\prompt;

function getAnswer($a, $b, $c, $d)
{
  if ($b === 0) {
    $sum = $a - $c;
    if ($d != $sum) {
      die("'$d' is wrong answer :( Correct answer was 
   '$sum'.\nLet's try again");
    } elseif ($d = $sum) {
      return ("correct");
    }
  }
  if ($b === 1) {
    $sum = $a + $c;
    if ($d != $sum) {
      die("'$d' is wrong answer :( Correct answer was 
   '$sum'.\nLet's try again");
    } elseif ($d = $sum) {
      return ("correct");
    }
  }
  if ($b === 2) {
    $sum = $a * $c;
    if ($d != $sum) {
      die("'$d' is wrong answer :( Correct answer was 
   '$sum'.\nLet's try again");
    } elseif ($d = $sum) {
      return ("correct");
    }
  }
}

function getQuestion($a, $b, $c)
{
  if ($b === 0) {
    return ("$a - $c");
  } elseif ($b === 1) {
    return ("$a + $c");
  } elseif ($b === 2) {
    return ("$a * $c");
  }
}


function  sixthStep(): void
{
  line("Welcome to the Brain Games!");
  $name = (prompt('May I Have your name?'));
  line("Hello, {$name}!");
  line('What is the result of the expression?');
  for ($i = 0; $i < 3; $i++) {
    $signs = ['-', '+', '*'];
    $randNum1 = rand(2, 9);
    $randNum2 = rand(2, 9);
    $randSigns = array_rand($signs);
    $inQuestion = getQuestion($randNum1, $randSigns, $randNum2);
    $question = [];
    $question = ("Question: $inQuestion");
    line($question);
    $answer = (prompt("Your answer"));
    $inAnswer = getAnswer($randNum1, $randSigns, $randNum2, $answer);
    line($inAnswer);
    $win[] = $inAnswer[$i];
    if (count($win) === 3) {
      line("Congratulations, $name!");
    }
  }
}

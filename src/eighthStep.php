<?php

namespace eighth\step;

use function cli\line;
use function cli\prompt;

function onPari($a, $b)
{
	if ($a === $b) {
		return ("correct");
	} elseif ($a !== $b) {
		die("'$b' is wrong answer :( Correct answer was '$a'.\nLet's try again");
	}
}

function eighth(){
line("Welcome to the Brain Games!");
$name = prompt('May I Have your name?');
line("Hello, {$name}!");
line('What number is missing in the progression?');
for ($i = 0; $i < 3; $i++) {
	$randNum = rand(4, 7);
	$randNum2 = rand(4,  7);
	$Num = 99;
	$arithmetic = range($randNum, $Num, $randNum2);
	$str = implode(" ", $arithmetic);
	$array = explode(" ", $str);
	$search = array_rand($array, 1);
	$key = array_search($search, $array);
	$randNum3 = rand(1, count($array));
	$replacement = array_splice($array, $randNum3, 1, "..");
	$inQuestion = implode(" ", $array);
	$inAnswer = implode(" ", $replacement);
	$question = [];
	$question = ("Question: $inQuestion");
	line($question);
	$answer = prompt("Your answer");
	$last = onPari($inAnswer, $answer);
	line($last);
	$win[] = $last[$i];
	if (count($win) === 3) {
		line("Congratulation, $name!");
  }
 }
}
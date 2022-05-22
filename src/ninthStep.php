<?php

namespace ninth\step;

use function cli\line;
use function cli\prompt;

function primeCheck($number)
{
	if ($number === 1) {
		return 0;
	}
	for ($i = 2; $i <= sqrt($number); $i++) {
		if ($number % $i == 0)
			return 0;
	}
	return 1;
}

function onParity(int $number1, string $answer1, $name)
{
	$flag = primeCheck($number1);
	if ($flag === 0 && $answer1 === 'yes' || $flag !== 0 && $answer1 === 'no') {
		echo ('correct');
	} elseif ($flag !== 0 && $answer1 === 'yes' || $flag === 0 && $answer1 === 'no') {
		die("Let's try again, $name!");
	}
}

function nine()
{
	line("Welcome to the Brain Games!");
	$name =  prompt('May I Have your name?');
	line("Hello, {$name}!");
	line('Answer "yes" if the number is prime, otherwise answer "no"');
	for ($i = 0; $i < 3; $i++) {
		$randNum = rand(2, 1000);
		$inAnswer = primeCheck($randNum);
		$question = [];
		$question = ("Question: $randNum");
		line($question);
		$answer = prompt("Your answer");
		$last = onParity($inAnswer, $answer, $name);
		line($last);
			$win[] = $last[$i];
			if (count($win) === 3) {
				line("Congratulations, $name!");
		}
	}
}

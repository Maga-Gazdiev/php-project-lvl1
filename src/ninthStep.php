<?php

namespace ninth\step;

use function cli\line;
use function cli\prompt;

function onParity(int $number1, string $answer1)
{
	if ($number1 === 2 && $answer1 === 'yes' || $number1 !== 2 && $answer1 === 'no') {
		echo('correct');
	} elseif ($number1 !== 2 && $answer1 === 'yes' || $number1 === 2 && $answer1 === 'no') {
		die('uncorrect');
	}
}
function nine(){
line("Welcome to the Brain Games!");
$name =  prompt('May I Have your name?');
line("Hello, {$name}!");
line('Answer "yes" if the number is prime, otherwise answer "no"');
for ($i = 0; $i < 3; $i++) {
	$randNum = rand(2, 1000);
	$inAnswer = gmp_prob_prime($randNum);
	$question = [];
	$question = ("Question: $randNum");
	line($question);
    $answer = prompt("Your answer");
	$last = onParity($inAnswer, $answer);
	line($last);
    if ($last === "correct") {
		$win[] = $last[$i];
		if (count($win) === 3) {
		  line("Congratulation, $name!");
		}
	  }
 }
}
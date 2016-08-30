<?php
$min = (is_numeric(isset($argv[1]))) ? $argv[1] : 1;

$max = (is_numeric(isset($argv[2]))) ? $argv[2] : 100;

$intro = <<<GAME
----------------------------------------------------------------------
------------------------------High or Low-----------------------------
----------------------------------------------------------------------
------------------------------Directions:-----------------------------
----------------------------------------------------------------------
1.) the computer will randomly generate a number between {$min} and {$max}
2.) player will be prompted to enter a guess of the given number
3.) if players guess is lower than the given number, the computer 
	will output 'Higher' and the player will be prompted to 
	guess again
4.) if players guess is higher than the given number, the computer
	will output 'Lower' and the player will be prompted to 
	guess again
5.) when the given number is guessed, player wins!
GAME;

$playGame = true;

echo $intro . PHP_EOL;

while ($playGame == true) {
	$randomNumber = mt_rand($min, $max);
	fwrite(STDOUT, "guess a number between $min and $max ");
	$numberOfGuesses = 0;
	$playerGuess = trim(fgets(STDIN));
	do {
		if (is_numeric($playerGuess)) {
			if ($playerGuess < $randomNumber) {
				fwrite(STDOUT, 'Higher. Guess Again ');
				$playerGuess = trim(fgets(STDIN));
				$numberOfGuesses += 1;
			} else if ($playerGuess > $randomNumber) {
				fwrite(STDOUT, 'Lower. Guess Again ');
				$playerGuess = trim(fgets(STDIN));
				$numberOfGuesses += 1;
			}; 
		} else {
			fwrite(STDOUT, "guess a number between $min and $max ");
			$playerGuess = trim(fgets(STDIN));
		};
		
	} while ($playerGuess != $randomNumber);

	if ($playerGuess == $randomNumber) {
		echo 'Good Guess! You Win!' . PHP_EOL;
		echo "It took you $numberOfGuesses guesses to win" . PHP_EOL;
	};

	fwrite(STDOUT, "Play Again? (enter 'y' for yes or 'n' for no) ");
	$playAgain = trim(fgets(STDIN));

	if ($playAgain == 'y') {
		$playGame = true;
	} elseif ($playAgain != 'y') {
		$playGame = false;
		echo "ok. I didn't want you to play again anyway." . PHP_EOL;
	};
};






<?php

require_once __DIR__.'/vendor/autoload.php';

use BullsAndCows\Game;
use BullsAndCows\Guess;
use BullsAndCows\Matcher;

echo "Try to figure out the four digit number that I set...\n";

$game = new Game();
$answer = $game->createAnswer();

while($game->isGameOver() === false)
{
    echo "Guess: ";
    $new_guess = trim(fgets(STDIN));
    $guess = new Guess($new_guess);
    
    if(!$guess->isValid()){
        continue;
    }

    $game->incrementGuesses($guess);
    $match = $game->matchGuess($guess);
    if($match->isCorrect()) 
    {
        $game->setGameOverToTrue();
        $guess_count = $game->countGuesses();
        if( $guess_count == 1 )
        {
            echo "Winner first try!\n";
        }
        else
        {
            echo "Winner in $guess_count tries.\n";
        }
    }
    else
    {
       $bulls = $match->getBulls();
       $cows = $match->getCows();
       echo "$bulls Bulls, $cows Cows \n";
       echo "Try Again..." . "\n";
       foreach($game->getGuesses() as $key => $guess){
           echo $key + 1 . ") " .  $guess->getValue() . "\n";
       }
       echo "\n";
    }
}

echo "Game complete.\n";

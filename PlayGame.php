<?php

require_once __DIR__.'/vendor/autoload.php';

use BullsAndCows\Game;
use BullsAndCows\Guess;
use BullsAndCows\Matcher;

echo "Are you sure you want to start playing Bulls and Cows?  Type 'yes' to continue: ";
$question = fgets(STDIN);
$yes = preg_match('/^(?i)yes/', trim($question));
if(!$yes){
    echo "ABORTING!\n";
        exit;
}
echo "\n";
echo "Great! Try to figure out the four digit number that I set...\n";

$game = new Game();
$set_answer = $game->setAnswer('1234');

for ($guesses = 1; ; $guesses++){
    while(true){
        echo "Guess # $guesses \n";
        $new_guess = rtrim(fgets(STDIN));
        $guess = new Guess($new_guess);
        break;
    }
    $matcher = new Matcher();
    $guess_a = $matcher->setGuessA($guess);
    $guess = $guess_a->getGuessA()->getValue();
    $answer = $set_answer->getAnswer();
    if ($guess == $answer){
        if ($guesses > 1){
            echo "Winner in $guesses tries. \n";
            exit;
        } else if ($guesses == 1){
            echo "Winner first try! \n";
            exit;
        }
    }
    else {
       $bulls = 0;
       $cows = 0;
       foreach(range(0, 3) as $i){
           if($guess[$i] == $answer[$i])
               $bulls++;
           else if(strpos($answer, $guess[$i]) !== FALSE)
               $cows++;
       }
       echo "$bulls Bulls, $cows Cows \n\n";

   }
}
?>



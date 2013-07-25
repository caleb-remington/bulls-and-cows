<?php

namespace BullsAndCows;

use BullsAndCows\Exceptions\GameIsAlreadyOverException;

class Game 
{
    private $answer;
    private $guesses = array();
    private $game_over = false; 

    /**
     * to string
     */
    public function __toString()
    {
        $this->game_over = false;
        $this->guesses = array();
        return $this;
    }

    /**
     * Set answer.
     *
     */
    public function createAnswer()
    {
        $size = 4;
        $answer = implode(array_rand(array_flip(range(1,9)), $size));
        $this->answer = $answer;
        return $this;
    }

    /**
     * Set answer.
     *
     * @return string 
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this->answer;
    }

    /**
     * Get answer.
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }
   
    /**
     * Set game over.
     *
     */
    public function setGameOverToTrue()
    {
        $this->game_over = true;
        return $this;
    }

    /**
     * Check to see if game is over or not.
     *
     * @return self
     */
    public function isGameOver()
    {
        if ($this->game_over){
            return true;
        }
        return false;
    }

    /**
     * Add Guess
     */
    public function matchGuess($guess) 
    {
        $matcher = new Matcher();
        $guess_a = $matcher->setGuessA($guess);
        $answer = new Guess($this->answer);
        $guess_b = $matcher->setGuessB($answer);
        $match = $matcher->execute();
        return $match;
    }

    /**
     * Count number of guesses
     */
    public function incrementGuesses($guess)
    {
        if($guess){
            $this->guesses[] = $guess;
        }
        return $this;
    }

    /**
     * Count number of guesses
     *
     * @return self
     */
    public function countGuesses()
    {
        return count($this->guesses);
    }

    /**
     * Get guesses
     *
     * @return self
     */
    public function getGuesses()
    {
        return $this->guesses;
    }
}


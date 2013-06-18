<?php

namespace BullsAndCows;

use BullsAndCows\Exceptions\GameIsAlreadyOverException;

class Game 
{
    private $answer;
    private $guesses;
    private $game_over; 

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->game_over = false;
        $this->guesses = array();
        return $this;
    }

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
     * Set Answer.
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }
    
    /**
     * Get Answer.
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Add Guess
     */
    public function addGuess($guess) 
    {
        if ($this->game_over){
            throw new GameIsAlreadyOverException('This game is already over.');
        }
        
        array_push($this->guesses, $guess);
        
        if ($guess == $this->answer)
        {
            $this->game_over = true;

            return true;
        }
        return false;
    }

    /**
     * Count number of guesses
     */
    public function countGuesses($count)
    {
        if ($count == 3)
        {
            return true;
        }
        return false;
    }
}


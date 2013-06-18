<?php

namespace BullsAndCows\Tests;

use PHPUnit_Framework_TestCase;
use BullsAndCows\Game;
use BullsAndCows\Guess;
use BullsAndCows\Exceptions\GameIsAlreadyOverException;

class GameTest extends PHPUnit_Framework_TestCase 
{
    private $game;
     
    protected function setUp()
    {
        $this->game = new Game();
        $this->game->setAnswer('1234');
    }

    public function testGuessCorrectAnswer()
    {
        $successful = $this->game->addGuess('1234');
        $this->assertTrue($successful);
    }

    public function testGuessIncorrectAnswer()
    {
        $successful = $this->game->addGuess('1432');
        $this->assertFalse($successful);
    }

    public function testCountNumberOfGuesses()
    {
        $this->game->addGuess('3214');
        $this->game->addGuess('1343');
        $this->game->addGuess('9898');
        
        $counter = $this->game->countGuesses('3');
        $this->assertTrue($counter);
    }
    
    /**
     * @expectedException \BullsAndCows\Exceptions\GameIsAlreadyOverException 
     *
     */
    public function testNoGuessesAfterGameOver() 
    {
        $this->game->addGuess('1234');
        $this->game->addGuess('5678');
    }
}


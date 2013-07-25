<?php

namespace BullsAndCows\Tests;

use PHPUnit_Framework_TestCase;
use BullsAndCows\Game;
use BullsAndCows\Guess;
use BullsAndCows\Matcher;
use BullsAndCows\Match;
use BullsAndCows\Exceptions\GameIsAlreadyOverException;

class GameTest extends PHPUnit_Framework_TestCase 
{
    private $game;
     
    protected function newGame()
    {
        $this->game = new Game(); 
        return $this->game;
    }

    public function testCreateFourDigitAnswer()
    {
        $game = $this->newGame();
        $game->createAnswer();
        $this->assertRegExp('/^\d{4}$/', $game->getAnswer());
    }
    
    public function testMatchGuessReturnsMatchObject()
    {
        $game = $this->newGame();
        $answer = $game->createAnswer();
        $guess = new Guess('1234');
        $match = $game->matchGuess($guess);
        $this->assertObjectHasAttribute('cows', $match);
        $this->assertObjectHasAttribute('bulls', $match);
    }

    public function testGameOverIsFalse()
    {
        $game = $this->newGame();
        $this->assertFalse($game->isGameOver());
    }

    public function testGameOverIsTrue()
    {
        $game = $this->newGame();
        $game->setGameOverToTrue();
        $this->assertTrue($game->isGameOver());
    }

    public function testGuessGetsAddedToGuessesVariable()
    {
        $game = $this->newGame();
        $guess = new Guess('1234');
        $game->incrementGuesses($guess);
        $this->assertArrayHasKey('0', $game->getGuesses());
    }

    public function testGuessGetsCountedProperly()
    {
        $game = $this->newGame();
        $guess_1 = new Guess('1234');
        $guess_2 = new Guess('4321');
        $game->incrementGuesses($guess_1);
        $game->incrementGuesses($guess_2);
        $this->assertEquals($game->countGuesses(), 2);
    }
}


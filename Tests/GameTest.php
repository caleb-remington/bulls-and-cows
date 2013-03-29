<?php

namespace BullsAndCows\Tests;

use PHPUnit_Framework_TestCase;
use BullsAndCows\Game;
use BullsAndCows\Exceptions\ExceptionGameInProgress;

class GameTest extends PHPUnit_Framework_TestCase 
{
    private $game;

    protected function setUp() 
    {
        $this->game = new Game();
    }

    protected function tearDown()
    {
        $this->game = null;
    }

    public function testStartingGame()
    {
        $game = new Game();
    }

    /**
     * A new game is active.
     */
    public function testNewGameIsActive()
    {
        $this->assertTrue( $this->game->isActive() );
    }

    /**
     * A new game has no winner
     */
    public function testNewGameNoWinner()
    {
        $this->assertException( ExceptionGameInProgress );
        $winner = $this->game->isWinner();
    }

}


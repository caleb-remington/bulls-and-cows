<?php

namespace BullsAndCows\Tests;

use PHPUnit_Framework_TestCase;
use BullsAndCows\Guess;
use InvalidAgunmentException; 

class GuessTest extends PHPUnit_Framework_TestCase 
{
    /**
     * Validate the guess
     * @expectedException InvalidArgumentException
     */
    public function testInvalidGuessString()
    {
        $crappy_string = 'AB2D';

        $guess = new Guess($crappy_string); 
    }

    /**
     * Test get guess
     */
    public function testGetGuess()
    {
        $guess_string = '1432';
        $guess = new Guess($guess_string);
        $guess_value = $guess->getValue();
        $this->assertEquals($guess_string, $guess_value);
    }
}


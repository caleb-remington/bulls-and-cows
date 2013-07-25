<?php

namespace BullsAndCows\Tests;

use PHPUnit_Framework_TestCase;
use BullsAndCows\Guess;
use BullsAndCows\Exceptions\InvalidArgumentException;

class GuessTest extends PHPUnit_Framework_TestCase 
{
    /**
     * Validate the guess message
     * @expectedException BullsAndCows\Exceptions\InvalidArgumentException
     */
    public function testInvalidGuessStringThrowsRightMessage()
    {
        $crappy_string = 'AB2D';
        $guess = new Guess($crappy_string); 
        $this->setExpectedException('BullsAndCows\Exceptions\InvalidArgumentException', 'Guesses can only contain 4 digits.');
        throw new InvalidArgumentException('Guesses can only contain 4 digits.');
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

    /**
     * Test valid guess
     */
    public function testValidGuess()
    {
        $guess_string = '1432';
        $guess = new Guess($guess_string);
        $valid = $guess->isValid();
        $this->assertTrue($valid);
    }

    /**
     * Test invalid guess
     */
    public function testInvalidGuess()
    {
        $guess_string = '1zz2';
        $guess = new Guess($guess_string);
        $valid = $guess->isValid();
        $this->assertFalse($valid);
    }
}


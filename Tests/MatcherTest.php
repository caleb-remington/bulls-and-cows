<?php

namespace BullsAndCows\Tests;

use PHPUnit_Framework_TestCase;
use BullsAndCows\Matcher;
use BullsAndCows\Guess;

class MatcherTest extends PHPUnit_Framework_TestCase 
{
    /**
     * Test set first guess.
     */
    public function testGuessA()
    {
        $matcher = new Matcher();
        $guessA = new Guess( '1234' );
        $matcher->setGuessA( $guessA );
        $matchGuessA = $matcher->getGuessA();
        $this->assertEquals( $guessA, $matchGuessA );
    }

    /**
     * Test set second guess.
     */
    public function testGuessB()
    {
        $matcher = new Matcher();
        $guessB = new Guess( '5678' );
        $matcher->setGuessB( $guessB );
        $matchGuessB = $matcher->getGuessB();
        $this->assertEquals( $guessB, $matchGuessB );
    }
    
    /**
     * Test successful match
     */
    public function testSuccessfulMatch()
    {
        $matcher = new Matcher();
        $guessA = new Guess( '1234' );
        $guessB = new Guess( '1234' );
        $matcher->setGuessA( $guessA );
        $matcher->setGuessB( $guessB );
        $match = $matcher->match();
        $this->assertTrue( $match );
    }

    /**
     * Test successful match
     */
    public function testFailedMatch()
    {
        $matcher = new Matcher();
        $guessA = new Guess( '1234' );
        $guessB = new Guess( '5678' );
        $matcher->setGuessA( $guessA );
        $matcher->setGuessB( $guessB );
        $match = $matcher->match();
        $this->assertFalse( $match );
    }
}


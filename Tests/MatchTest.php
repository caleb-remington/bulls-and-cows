<?php

namespace BullsAndCows\Tests;

use PHPUnit_Framework_TestCase;
use BullsAndCows\Matcher;
use BullsAndCows\Match;
use BullsAndCows\Guess;

class MatchTest extends PHPUnit_Framework_TestCase 
{
    /**
     * Test set first guess.
     */
    public function testBullsAndCowsAreSetToZero()
    {
        $match = new Match();
        $match->getBulls();
        $match->getCows();
        
        $new_match = new Match();
        $new_match->setBulls(0);
        $new_match->setCows(0);
        $this->assertEquals($new_match, $match);
    }
    
    /**
     * Test set first guess.
     */
    public function testBullsIncrementCorrectly()
    {
        $match = new Match();
        $match->setBulls(3);
        $match->setCows(0);
        
        $new_match = new Match();
        $new_match->increment('1234', '1239');
        $this->assertEquals($new_match, $match);
    }
    
    /**
     * Test set first guess.
     */
    public function testCowsIncrementCorrectly()
    {
        $match = new Match();
        $match->setBulls(0);
        $match->setCows(3);
        
        $new_match = new Match();
        $new_match->increment('1234', '4391');
        $this->assertEquals($new_match, $match);
    }
    
    /**
     * Test set first guess.
     */
    public function testCorrectMatch()
    {
        $match = new Match();
        $match->setBulls(4);
        $match->setCows(0);
        
        $new_match = new Match();
        $new_match->increment('1234', '1234');
        $this->assertEquals($new_match, $match);
    }
}

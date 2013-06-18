<?php

namespace BullsAndCows;

class Matcher 
{
    private $guess_a;
    private $guess_b;

    /**
     * set guess A
     */
    public function setGuessA($guessA)
    {
        $this->guess_a = $guessA;
        return $this;
    }  
    
    /**
     * get guess A 
     *
     * @return string 
     */
    public function getGuessA()
    {
        return $this->guess_a;
    }  
    
    /**
     * set guess B
     */
    public function setGuessB($guessB)
    {
        $this->guess_b = $guessB;
        return $this;
    }  
    
    /**
     * get guess B 
     *
     * @return string 
     */
    public function getGuessB()
    {
        return $this->guess_b;
    }  

    /**
     * Check if guess A matches guess B.
     */
    public function match()
    {
        $guess_a = $this->guess_a;
        $guess_b = $this->guess_b;
        
        $guess_a_value = $guess_a->getValue();
        $guess_b_value = $guess_b->getValue();

        $match = $guess_a_value == $guess_b_value;

        return $match;
    }
    
}


<?php

namespace BullsAndCows;

class Match 
{
    private $bulls = 0;
    private $cows = 0;

    /**
     * set Bullls.
     */
    public function setBulls($bulls)
    {
        $this->bulls = $bulls;
        return $this;
    }  
    
    /**
     * get Bulls 
     *
     * @return string 
     */
    public function getBulls()
    {
        return $this->bulls;
    }  
    
    /**
     * set Cows
     */
    public function setCows($cows)
    {
        $this->cows = $cows;
        return $this;
    }  
    
    /**
     * get Cows 
     *
     * @return string 
     */
    public function getCows()
    {
        return $this->cows;
    }  
    
     /**
      * Match two guess objects.
      *
      * @return self
      */
     public function isCorrect()
     {
        if($this->getBulls() === 4)
        {
            return true;
        }
        return false;
     }
    
    /**
      * increment
      *
      * @return self
      */
     public function increment($guess_a, $guess_b)
     {
            $answer = $guess_b;
            $guess = $guess_a;
            foreach(range(0, 3) as $i){
                if($answer[$i] == $guess[$i]){
                    $this->bulls++;
                }
                else if(strpos($guess, $answer[$i]) !== FALSE){
                    $this->cows++;
                }
            }
            return $this;
      }
}


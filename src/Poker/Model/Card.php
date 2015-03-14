<?php namespace Poker\Model;

class Card
{
    private $suit;
    private $denominator;

    /**
     * @return mixed
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @param mixed $suit
     */
    public function setSuit($suit)
    {
        $this->suit = $suit;
    }

    /**
     * @return mixed
     */
    public function getDenominator()
    {
        return $this->denominator;
    }

    /**
     * @param mixed $denominator
     */
    public function setDenominator($denominator)
    {
        $this->denominator = $denominator;
    }
}
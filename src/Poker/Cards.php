<?php namespace Poker;

use Poker\Model\Card;

class Cards
{
    private $cards;

    public function __construct()
    {
        $suits = ['c', 'd', 'h', 's'];
        $cards = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
        foreach ($suits as $suit) {
            foreach ($cards as $card) {
                $cardModel = new Card();
                $cardModel->setSuit($suit);
                $cardModel->setDenominator($card);
                $this->cards[$card . $suit] = $cardModel;
            }
        }
    }

    public function getCard($string)
    {
        return isset($this->cards[$string]) ? $this->cards[$string] : null;
    }

    public function removeCardByString($string)
    {
        unset($this->cards[$string]);
    }

    public function removeCardByObject(Card $object)
    {
        foreach ($this->cards as $index => $card) {
            if ($card == $object) {
                unset($this->cards[$index]);
            }
        }
    }
}
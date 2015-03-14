<?php namespace Poker\Model;

class PlayerHand
{
    private $face_cards;

    public function addFaceCard(Card $card)
    {
        $this->face_cards[] = $card;
    }

    /**
     * Return Card[]
     */
    public function getFaceCards()
    {
        return $this->face_cards;
    }
}
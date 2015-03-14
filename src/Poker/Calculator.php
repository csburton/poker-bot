<?php namespace Poker;

use Poker\Model\Match;use Poker\Response\Call;

class Calculator
{
    private $match;

    public function __construct(Match $match)
    {
        $this->match = $match;
    }

    public function calculateNextMove()
    {
        $myCards = $this->getMatch()->getCurrentHand()->getMyFaceCards();
        $myCards += $this->getMatch()->getCurrentHand()->getCommunityCards();
        $remainingCards = $this->getNumberOfRemainingCards();
        $response = new Call($this->getMatch());
        $response->setValue(0);
        return $response;
    }

    private function getNumberOfRemainingCards()
    {
        $players = count($this->getMatch()->getPlayers());
        $communityCards = count($this->getMatch()->getCurrentHand()->getCommunityCards());
        return 52 - $communityCards - ($players * 2);
    }

    /**
     * @return Match
     */
    public function getMatch()
    {
        return $this->match;
    }
}
<?php namespace Poker\Model;

use Poker\Cards;

class Match
{
    private $round;
    private $small_blind;
    private $big_blind;
    private $players;
    private $button;
    private $current_hand;
    private $previous_hands;
    private $settings;
    private $full_deck;

    public function __construct()
    {
        $this->settings = new Settings();
        $this->full_deck = new Cards();
    }

    /**
     * @return mixed
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * @param mixed $round
     */
    public function setRound($round)
    {
        $this->round = $round;
    }

    /**
     * @return mixed
     */
    public function getSmallBlind()
    {
        return $this->small_blind;
    }

    /**
     * @param mixed $small_blind
     */
    public function setSmallBlind($small_blind)
    {
        $this->small_blind = $small_blind;
    }

    /**
     * @return mixed
     */
    public function getBigBlind()
    {
        return $this->big_blind;
    }

    /**
     * @param mixed $big_blind
     */
    public function setBigBlind($big_blind)
    {
        $this->big_blind = $big_blind;
    }

    /**
     * @return Player[]
     */
    public function getPlayers()
    {
        return $this->players;
    }

    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
    }

    /**
     * @return Player
     */
    public function getButton()
    {
        return $this->button;
    }

    /**
     * @param mixed $player
     */
    public function setButton(Player $player)
    {
        $this->button = $player;
    }

    /**
     * @return Hand
     */
    public function getCurrentHand()
    {
        return $this->current_hand;
    }

    /**
     * @param mixed $current_hand
     */
    public function setCurrentHand(Hand $current_hand)
    {
        if ($this->current_hand) {
            $this->addPreviousHand($this->current_hand);
        }
        $this->current_hand = $current_hand;
    }

    /**
     * @return mixed
     */
    public function getPreviousHands()
    {
        return $this->previous_hands;
    }

    /**
     * @param Hand $previous_hand
     */
    public function addPreviousHand(Hand $previous_hand)
    {
        $this->previous_hands[] = $previous_hand;
    }

    /**
     * @return Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @return Cards
     */
    public function getFullDeck()
    {
        return $this->full_deck;
    }

    /**
     * @param Cards $full_deck
     */
    public function setFullDeck($full_deck)
    {
        $this->full_deck = $full_deck;
    }
}
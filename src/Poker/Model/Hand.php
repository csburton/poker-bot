<?php
namespace Poker\Model;

class Hand
{
    private $players;
    private $community_cards = array();
    private $player_turns;
    private $cards_left;
    private $button;
    private $max_win_pot;
    private $amount_to_call;
    private $my_face_cards;

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
     * @param mixed $players
     */
    public function setPlayers(array $players)
    {
        $this->players = $players;
    }

    /**
     * @return mixed
     */
    public function getCommunityCards()
    {
        return $this->community_cards;
    }

    public function getFlop()
    {
        if (!sizeof($this->community_cards)) {
            return [];
        }
        $cards = [];
        for ($i = 0; $i < 3; $i++) {
            $cards[] = $this->community_cards[$i];
        }
        return $cards;
    }

    public function getTurn()
    {
        return isset($this->community_cards[3]) ? $this->community_cards[3] : null;
    }

    public function getRiver()
    {
        return isset($this->community_cards[4]) ? $this->community_cards[4] : null;
    }

    public function setCommunityCards(array $cards)
    {
        $this->community_cards = $cards;
    }

    public function addCommunityCard(Card $card)
    {
        $this->community_cards[] = $card;
    }

    /**
     * @return mixed
     */
    public function getPlayerTurns()
    {
        return $this->player_turns;
    }

    public function addPlayerTurn(Turn $turn)
    {
        $this->player_turns[] = $turn;
    }

    /**
     * @return mixed
     */
    public function getCardsLeft()
    {
        return $this->cards_left;
    }

    /**
     * @param mixed $cards_left
     */
    public function setCardsLeft($cards_left)
    {
        $this->cards_left = $cards_left;
    }

    /**
     * @return mixed
     */
    public function getButton()
    {
        return $this->button;
    }

    /**
     * @param mixed $button
     */
    public function setButton($button)
    {
        $this->button = $button;
    }

    /**
     * @return mixed
     */
    public function getMaxWinPot()
    {
        return $this->max_win_pot;
    }

    /**
     * @param mixed $max_win_pot
     */
    public function setMaxWinPot($max_win_pot)
    {
        $this->max_win_pot = $max_win_pot;
    }

    /**
     * @return mixed
     */
    public function getAmountToCall()
    {
        return $this->amount_to_call;
    }

    /**
     * @param mixed $amount_to_call
     */
    public function setAmountToCall($amount_to_call)
    {
        $this->amount_to_call = $amount_to_call;
    }

    /**
     * @return mixed
     */
    public function getMyFaceCards()
    {
        return $this->my_face_cards;
    }

    /**
     * @param mixed $my_face_cards
     */
    public function setMyFaceCards($my_face_cards)
    {
        $this->my_face_cards = $my_face_cards;
    }
}
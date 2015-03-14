<?php namespace Poker\Handler;

use Poker\Cards;
use Poker\Model\Hand;
use Poker\Model\Player;

class Match extends AbstractHandler
{
    public function handle()
    {
        if ($this->getCommand() == 'round') {
            $newHand = new Hand();
            $newHand->setCardsLeft(new Cards());
            $this->getMatch()->setCurrentHand($newHand);
            $this->getMatch()->setRound(intval($this->getArguments()));
        }

        if ($this->getCommand() == 'small_blind') {
            $this->getMatch()->setSmallBlind($this->getArguments());
        }

        if ($this->getCommand() == 'big_bling') {
            $this->getMatch()->setBigBlind($this->getArguments());
        }

        if ($this->getCommand() == 'on_button') {
            $foundPlayer = false;
            foreach ($this->getMatch()->getPlayers() as $player) {
                if ($player->getName() == $this->getArguments()) {
                    $foundPlayer = true;
                    if (!$this->getMatch()->getCurrentHand()) {
                        $hand = new Hand();
                        $hand->setPlayers($this->getMatch()->getPlayers());
                        $hand->setButton($player);
                        $hand->setCardsLeft(new Cards());
                        $this->getMatch()->setCurrentHand($hand);
                    } else {
                        $this->getMatch()->getCurrentHand()->setButton($player);
                    }
                    $this->getMatch()->setButton($player);
                }
            }
            if (!$foundPlayer) {
                $player = new Player();
                $player->setName($this->getArguments());
                $this->getMatch()->addPlayer($player);
                if (!$this->getMatch()->getCurrentHand()) {
                    $hand = new Hand();
                    $hand->setPlayers($this->getMatch()->getPlayers());
                    $hand->setButton($player);
                    $hand->setCardsLeft(new Cards());
                    $this->getMatch()->setCurrentHand($hand);
                } else {
                    $this->getMatch()->getCurrentHand()->setButton($player);
                }
                $this->getMatch()->setButton($player);
            }
        }

        if ($this->getCommand() == 'max_win_pot') {
            $this->getMatch()->getCurrentHand()->setMaxWinPot($this->getArguments());
        }

        if ($this->getCommand() == 'amount_to_call') {
            $this->getMatch()->getCurrentHand()->setAmountToCall($this->getArguments());
        }

        if ($this->getCommand() == 'table') {
            $cards = explode(',', substr($this->getArguments(), 1, -1));
            $communityCards = [];
            foreach ($cards as $card) {
                $cardModel = $this->getMatch()->getFullDeck()->getCard($card);
                $communityCards[] = $cardModel;
            }
            $this->getMatch()->getCurrentHand()->setCommunityCards($communityCards);
        }

        if ($this->getCommand() == 'status') {
            var_dump($this->getMatch()->getSettings());
            var_dump($this->getMatch()->getPlayers());
            var_dump($this->getMatch()->getCurrentHand());
            var_dump($this->getMatch()->getBigBlind());
            var_dump($this->getMatch()->getButton());
        }
    }
}
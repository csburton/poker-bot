<?php namespace Poker\Handler;

use Poker\Model\Player;
use Poker\Model\Turn;

class PlayerMove extends AbstractHandler
{
    public function handle()
    {
        $playerName = $this->getHandler();
        $currentPlayer = null;
        foreach ($this->getMatch()->getPlayers() as $player) {
            if ($player->getName() == $playerName) {
                $currentPlayer = $player;
            }
        }

        if ($currentPlayer === null) {
            $currentPlayer = new Player();
            $currentPlayer->setName($playerName);
            $this->getMatch()->addPlayer($currentPlayer);
        }
        $player = $currentPlayer;
        $turn = new Turn();
        $turn->setPlayer($player);
        $turn->setAction($this->getCommand());
        $turn->setAmount($this->getArguments());
        $this->getMatch()->getCurrentHand()->addPlayerTurn($turn);
        if ($this->getCommand() == 'stack') {
            $player->setStack($this->getArguments());
        }

        if ($this->getCommand() == 'post') {
            $player->removeFromStack($this->getArguments());
        }

        if ($this->getCommand() == 'hand') {
            $handCards = explode(',', substr($this->getArguments(), 1, -1));
            $faceCards = [];
            foreach ($handCards as $handCard) {
                $cardModel = $this->getMatch()->getFullDeck()->getCard($handCard);
                $faceCards[] = $cardModel;
                foreach ($this->getMatch()->getCurrentHand()->getCardsLeft() as $index => $card) {
                    if ($card == $cardModel) {
                    }
                }
            }
            $this->getMatch()->getCurrentHand()->setMyFaceCards($faceCards);
        }
    }
}
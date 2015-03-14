<?php namespace Poker\Handler;

use Poker\Calculator;

class Action extends AbstractHandler
{
    public function handle()
    {
        $playerName = $this->getCommand();
        $currentPlayer = null;
        foreach ($this->getMatch()->getPlayers() as &$player) {
            if ($player->getName() == $playerName) {
                $player->setTimebank($this->getArguments());
            }
        }
        if ($playerName == $this->getMatch()->getSettings()->getMyPlayerName()) {
            /** It's my turn yay! **/
            $calculator = new Calculator($this->getMatch());
            return $calculator->calculateNextMove();
        }
        return null;
    }
}
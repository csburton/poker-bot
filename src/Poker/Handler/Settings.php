<?php namespace Poker\Handler;

class Settings extends AbstractHandler
{
    public function handle()
    {
        if ($this->getCommand() == 'time_bank') {
            $this->getMatch()->getSettings()->setTimeBank($this->getArguments());
        }

        if ($this->getCommand() == 'time_per_move') {
            $this->getMatch()->getSettings()->setTimePerMove($this->getArguments());
        }

        if ($this->getCommand() == 'hands_per_level') {
            $this->getMatch()->getSettings()->setHandsPerLevel($this->getArguments());
        }

        if ($this->getCommand() == 'starting_stack') {
            $this->getMatch()->getSettings()->setStartingStack($this->getArguments());
        }

        if ($this->getCommand() == 'your_bot') {
            $this->getMatch()->getSettings()->setMyPlayerName($this->getArguments());
        }
    }
}
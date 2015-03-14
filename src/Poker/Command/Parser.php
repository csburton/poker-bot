<?php namespace Poker\Command;

use Poker\Handler\Action;
use Poker\Handler\PlayerMove;
use Poker\Handler\Settings;
use Poker\Model\Match as MatchModel;

class Parser
{
    private $match;
    private $input;

    public function __construct(MatchModel $match, $input)
    {
        $this->match = $match;
        $this->input = rtrim($input);
    }

    public function handle()
    {
        if (!$this->input) {
            return null;
        }
        $handlerModel = null;
        list($handler, $command, $arguments) = explode(' ', $this->getInput());
        if ($handler == 'Match') {
            $handlerModel = new \Poker\Handler\Match($this->getMatch(), $handler, $command, $arguments);
        } elseif ($handler == 'Action') {
            $handlerModel = new Action($this->getMatch(), $handler, $command, $arguments);
        } elseif ($handler == 'Settings') {
            $handlerModel = new Settings($this->getMatch(), $handler, $command, $arguments);
        } else {
            $handlerModel = new PlayerMove($this->getMatch(), $handler, $command, $arguments);
        }


        if ($handlerModel !== null) {
            return $handlerModel->handle();
        } else {
            throw new \Exception('Unable to handle: ' . $this->getInput());
        }
    }

    /**
     * @return MatchModel
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }
}
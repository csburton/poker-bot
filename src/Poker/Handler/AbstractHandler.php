<?php namespace Poker\Handler;

use Poker\Model\Match;

abstract class AbstractHandler
{
    private $match;
    private $command;
    private $arguments;
    private $handler;

    public function __construct(Match $match, $handler, $command, $arguments)
    {
        $this->match = $match;
        $this->handler = $handler;
        $this->command = $command;
        $this->arguments = $arguments;
    }

    /**
     * @return Match
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @return mixed
     */
    protected function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @return mixed
     */
    public function getHandler()
    {
        return $this->handler;
    }

    abstract function handle();
}
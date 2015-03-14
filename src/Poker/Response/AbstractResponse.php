<?php namespace Poker\Response;

use Poker\Model\Match;

abstract class AbstractResponse
{
    abstract function getCommand();

    private $match;
    private $value = 0;

    public function __construct(Match $match)
    {
        $this->match = $match;
    }

    public function __toString()
    {
        if ($this->getValue() === null) {
            return $this->getCommand();
        } else {
            return $this->getCommand() . ' ' . $this->getValue();
        }
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return Match
     */
    protected function getMatch()
    {
        return $this->match;
    }
}
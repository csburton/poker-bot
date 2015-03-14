<?php
namespace Poker\Model;

class Player
{
    private $name;
    private $stack;
    private $timebank;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStack()
    {
        return $this->stack;
    }

    /**
     * @param mixed $stack
     */
    public function setStack($stack)
    {
        $this->stack = $stack;
    }

    public function removeFromStack($amount)
    {
        $this->stack -= $amount;
    }

    /**
     * @return mixed
     */
    public function getTimebank()
    {
        return $this->timebank;
    }

    /**
     * @param mixed $timebank
     */
    public function setTimebank($timebank)
    {
        $this->timebank = $timebank;
    }
}
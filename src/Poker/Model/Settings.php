<?php namespace Poker\Model;

class Settings
{
    private $time_bank;
    private $time_per_move;
    private $hands_per_level;
    private $starting_stack;
    private $my_player_name;

    /**
     * @return mixed
     */
    public function getTimeBank()
    {
        return $this->time_bank;
    }

    /**
     * @param mixed $time_bank
     */
    public function setTimeBank($time_bank)
    {
        $this->time_bank = $time_bank;
    }

    /**
     * @return mixed
     */
    public function getTimePerMove()
    {
        return $this->time_per_move;
    }

    /**
     * @param mixed $time_per_move
     */
    public function setTimePerMove($time_per_move)
    {
        $this->time_per_move = $time_per_move;
    }

    /**
     * @return mixed
     */
    public function getHandsPerLevel()
    {
        return $this->hands_per_level;
    }

    /**
     * @param mixed $hands_per_level
     */
    public function setHandsPerLevel($hands_per_level)
    {
        $this->hands_per_level = $hands_per_level;
    }

    /**
     * @return mixed
     */
    public function getStartingStack()
    {
        return $this->starting_stack;
    }

    /**
     * @param mixed $starting_stack
     */
    public function setStartingStack($starting_stack)
    {
        $this->starting_stack = $starting_stack;
    }

    /**
     * @return mixed
     */
    public function getMyPlayerName()
    {
        return $this->my_player_name;
    }

    /**
     * @param mixed $my_player_name
     */
    public function setMyPlayerName($my_player_name)
    {
        $this->my_player_name = $my_player_name;
    }
}
<?php namespace Poker\Response;


class Check extends AbstractResponse
{
    public function getCommand()
    {
        return 'check';
    }
}
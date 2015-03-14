<?php namespace Poker\Response;


class Call extends AbstractResponse
{
    public function getCommand()
    {
        return 'call';
    }
}
<?php namespace Poker\Response;


class Raise extends AbstractResponse
{
    public function getCommand()
    {
        return 'raise';
    }
}
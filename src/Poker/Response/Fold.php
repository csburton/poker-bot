<?php namespace Poker\Response;


class Fold extends AbstractResponse
{
    public function getCommand()
    {
        return 'fold';
    }
}
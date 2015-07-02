<?php

namespace Prhost\Phreal;

class Phreal
{
    /**
     * Create a new Skeleton Instance
     */
    public function __construct()
    {
        // constructor body
    }

    /**
     *
     * @param string $phrase Phrase to return
     * @return string Returns the phrase passed in
     */
    public function run($phrase)
    {
        \Event('click', '#idtal')->set('name');
    }

    public function handler()
    {
        \Response('#idtal', 'wawa');
    }
}

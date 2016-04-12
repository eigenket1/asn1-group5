<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 *
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------
    function index()
    {
        $this->data['pagebody'] = 'homepage';

        $this->data['recentMovements'] = $this->stocks->getRecentMovements(5)->result();
        $this->data['recentTransactions'] = $this->stocks->getRecentTransactions(5)->result();
        $this->data['stockCodes'] = $this->stocks->getCodes()->result();
        $this->data['playerList'] = $this->players->getPlayersAndEquity();

        $this->data['gameStatus'] = $this->game->getStatus();

        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
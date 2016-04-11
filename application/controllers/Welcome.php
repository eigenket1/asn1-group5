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

        $this->data['stockCodes'] = $this->stocks->getCodes()->result();
        $this->data['playerList'] = $this->players->getPlayersAndEquity();

        $this->data['gameStatus'] = $this->getGameStatus();

        $this->render();
    }

    function getGameStatus()
    {
        $url = 'http://bsx.jlparry.com/status';
        $xml = simplexml_load_file($url);
        return array(
            array(
                'round' => $xml->round,
                'state' => $xml->state,
                'desc' => $xml->desc
            )
        );
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
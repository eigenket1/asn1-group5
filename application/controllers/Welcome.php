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
        $this->data['stocklist'] = $this->getStockListings();
        $this->data['playerlist'] = $this->getPlayerListing();
        $this->render();
    }

    function getStockListings()
    {
        $result = $this->stocks->getCodes();
        $tablestring = "<tr><td>Code</td><td>Value</td></tr>";

        foreach ($result->result() as $row) {
            $value = $this->stocks->getStockValue($row->Code)->result();

            $tablestring .= "<tr><td><a href=\"stocks/";
            $tablestring .= $row->Code;
            $tablestring .= "\">";
            $tablestring .= $row->Code;
            $tablestring .= "</a></td>";
            foreach ($value as $v) {
                $tablestring .= "<td>" . $v->Value . "</td>";
            }
            $tablestring .= "</tr>";
        }

        return $tablestring;
    }

    function getPlayerListing()
    {
        $result = $this->players->getPlayers();

        $tablestring = "<tr><td>Player</td><td>Cash</td><td>Equity</td></tr>";

        foreach ($result->result() as $row) {
            $tablestring .= "<tr><td><a href='/player/" . $row->Player . "'>" . $row->Player . "</a></td>";
            $tablestring .= "<td>" . $row->Cash . "</td>";
            $tablestring .= "<td>" . $this->players->getPlayerEquity($row->Player) . "</td>";
            $tablestring .= "</tr>";
        }

        return $tablestring;

    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
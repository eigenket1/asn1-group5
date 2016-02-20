<?php

/**
 * Player page
 *
 * controllers/Player.php
 *
 * ------------------------------------------------------------------------
 */
class Player extends Application
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
        $this->get(''); // No player specified
    }

    function get($playerName)
    {
        $currentPlayer = "Select a Player to View Profile";
        if (!empty($_SESSION['player'])) {
            $currentPlayer = $_SESSION['player'];
        }
        if (!empty($playerName)) {
            $currentPlayer = $playerName;
        }
        $this->data['currentPlayer'] = $currentPlayer . "'s Profile";

        /**
         * Shows player recent activity
         */
        $activity = $this->players->getPlayerActivity($currentPlayer);
        $this->data['activity'] = "<table style='width:100%;'>"
            . "<tr><td>Date/Time</td><td>Stock</td><td>Trans</td><td>Quantity</td></tr>";
        foreach ($activity->result() as $thisActivity) {
            $this->data['activity'] .= "<tr><td>" . $thisActivity->DateTime . "</td><td>"
                . $thisActivity->Stock . "</td><td>" . $thisActivity->Trans . "</td><td>"
                . $thisActivity->Quantity . "</td></tr>";
        }
        $this->data['activity'] .= "</table>";

        /**
         * Shows player stock holdings
         */
        $stocks = $this->players->getPlayerHoldings($currentPlayer);
        $this->data['holdings'] = "<table style='width:100%;'>"
            . "<tr><td>Stock</td><td>Quantity</td></tr>";
        foreach ($stocks as $key => $thisStock) {
            if ($thisStock == 0) {
                continue; // Skip stock values of 0
            }
            $this->data['holdings'] .= "<tr><td>" . $key . "</td><td>" . $thisStock . "</td></tr>";
        }
        $this->data['holdings'] .= "</table>";

        /**
         * Shows player dropdown list
         */
        $players = $this->players->getPlayers();
        $this->data['players'] = '<select name="playerChoice" onchange="this.form.submit()">\n<option value="">Select a Player</option>';
        foreach ($players->result() as $thisPlayer) {
            $this->data['players'] .= "<option value='" . $thisPlayer->Player . "'>" . $thisPlayer->Player . "</option>";
        }
        $this->data['players'] .= '</select>';
        $this->data['pagebody'] = 'playerpage';
        $this->render();
    }

    public function getSpecificPlayer()
    {
        $player = $this->input->get('playerChoice');
        redirect("player/$player");
    }

}
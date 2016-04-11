<?php

class Players extends MY_Model
{

    // constructor
    function __construct()
    {
        parent::__construct('players', 'Player');
    }

    /**
     * Returns all players, or a single player if a $player is passed in the optional parameter
     *
     * @param string $player
     * @return mixed
     */
    function getPlayers($player = '')
    {
        $queryString = "SELECT * FROM `players` ";
        if (!empty($player)) {
            $queryString .= "WHERE Player='$player'";
        }
        $result = $this->db->query($queryString);

        return $result;
    }

    /**
     * Returns all players fitting query with their equity
     *
     * @param string $player
     * @return mixed
     */
    function getPlayersAndEquity($player = '')
    {
        $queryString = "SELECT * FROM `players` ";
        if (!empty($player)) {
            $queryString .= "WHERE Player='$player'";
        }
        $result = $this->db->query($queryString)->result();

        $playerArray = array();
        foreach ($result as $thisPlayer) {
            $playerArray[$thisPlayer->Player] = [
                'Player' => $thisPlayer->Player,
                'Cash' => $thisPlayer->Cash,
                'Equity' => $this->getPlayerEquity($thisPlayer->Player)
            ];
        }

        return $playerArray;
    }

    /**
     * Returns the stocks associated in any way with a $player
     *
     * @param $player
     * @return mixed
     */
    function getPlayerStocks($player)
    {
        $queryString = "SELECT * FROM transactions WHERE Player='" . $player . "'";
        $result = $this->db->query($queryString);

        return $result;
    }

    /**
     * Returns the transactions associated with $player
     *
     * @param $player
     * @return mixed
     */
    function getPlayerActivity($player)
    {
        $queryString = "SELECT * FROM transactions WHERE Player='" . $player . "' ORDER BY DateTime DESC";
        $result = $this->db->query($queryString);

        return $result;
    }

    /**
     * Returns player equity as an array formatted like StockCode => CurrentValueOfStocks
     * Includes 0 and negative amounts, which can be filtered afterwards if desired
     *
     * @param $player
     * @return int
     */
    function getPlayerEquity($player)
    {
        $queryString = "SELECT transactions.*, stocks.Value AS customValue FROM transactions JOIN stocks ON stocks.Code = transactions.Stock WHERE Player='" . $player . "'";
        $activity = $this->db->query($queryString);

        $stockArray = array();
        foreach ($activity->result() as $thisStock) {
            if (!isset($stockArray[$thisStock->Stock])) {
                $stockArray[$thisStock->Stock] = 0;
            }
            if ($thisStock->Trans == 'sell') {
                $stockArray[$thisStock->Stock] -= $thisStock->Quantity * $thisStock->customValue;
            } else if ($thisStock->Trans == 'buy') {
                $stockArray[$thisStock->Stock] += $thisStock->Quantity * $thisStock->customValue;
            }
        }
        $equity = 0;
        foreach ($stockArray as $thisStock) {
            $equity += $thisStock;
        }
        return $equity;
    }

    /**
     * Returns an array formatted as StockCode => QuantityOwnedBy$Player
     * Includes 0 and negative amounts, which can be filtered afterwards if desired
     *
     * @param $player
     * @return array
     */
    function getPlayerHoldings($player)
    {
        $queryString = "SELECT transactions.*, stocks.Value AS customValue FROM transactions JOIN stocks ON stocks.Code = transactions.Stock WHERE Player='" . $player . "'";
        $activity = $this->db->query($queryString);

        $stockArray = array();
        foreach ($activity->result() as $thisStock) {
            if (!isset($stockArray[$thisStock->Stock])) {
                $stockArray[$thisStock->Stock] = 0;
            }
            if ($thisStock->Trans == 'sell') {
                $stockArray[$thisStock->Stock] -= (int)$thisStock->Quantity;
            } else if ($thisStock->Trans == 'buy') {
                $stockArray[$thisStock->Stock] += (int)$thisStock->Quantity;
            }
        }

        $returnArray = array();
        foreach ($stockArray as $key => $value) {
            $returnArray[] = array(
                'Stock' => $key,
                'Quantity' => $value
            );
        }
        return $returnArray;
    }
}

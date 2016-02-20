<?php

class Players extends MY_Model
{

	// constructor
	function __construct()
	{
		parent::__construct('players', 'Player');
	}

	function getPlayers($player = '')
	{
		$queryString = "SELECT * FROM `players` ";
		if (!empty($player)) {
			$queryString .= "WHERE Player='$player'";
		}
		$result = $this->db->query($queryString);

		return $result;
	}

	function getPlayerStocks($player)
	{
		$queryString = "SELECT * FROM transactions WHERE Player='" . $player . "'";
		$result = $this->db->query($queryString);

		return $result;
	}

	function getPlayerActivity($player)
	{
		$queryString = "SELECT * FROM transactions WHERE Player='" . $player . "' ORDER BY DateTime DESC";
		$result = $this->db->query($queryString);

		return $result;
	}
	
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
}

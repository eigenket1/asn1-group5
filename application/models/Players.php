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

}
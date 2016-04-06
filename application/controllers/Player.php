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
		if (!empty($_SESSION['username'])) {
			$currentPlayer = $_SESSION['username'];
		}
		if (!empty($playerName)) {
			$currentPlayer = $playerName;
		}

		$this->data['currentPlayer'] = $currentPlayer;
		$this->data['playerActivities'] = $this->players->getPlayerActivity($currentPlayer)->result();
		$this->data['playerHoldings'] = $this->players->getPlayerHoldings($currentPlayer);
		$this->data['playerList'] = $this->players->getPlayers()->result();
		$this->data['pagebody'] = 'playerpage';

		$this->render();
	}

	public function getSpecificPlayer()
	{
		$player = $this->input->get('playerChoice');
		redirect("player/$player");
	}

}
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
			$currentPlayer = $_SESSION['player'] . "'s Profile";
		}
		if (!empty($playerName)) {
			$currentPlayer = $playerName . "'s Profile";
		}
		$this->data['currentPlayer'] = $currentPlayer;

		/**
		 * Shows player recent activity
		 */
		$activity = $this->players->getPlayerActivity($playerName);
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
		$stocks = $this->players->getPlayerStocks($playerName);
		$this->data['activity'] = "<table style='width:100%;'>"
			. "<tr><td>Stock</td><td>Quantity</td></tr>";
		$stockArray = array();
		foreach ($activity->result() as $thisStock) {
			if (!isset($stockArray[$thisStock->Stock])) {
				$stockArray[$thisStock->Stock] = 0;
			}
			if ($thisStock->Action == 'down') {
				$stockArray[$thisStock->Stock] -= $thisStock->Quantity;
			} else if ($thisStock->Action == 'up') {
				$stockArray[$thisStock->Stock] += $thisStock->Quantity;
			}
		}
		foreach ($stockArray as $key => $thisStock) {
			$this->data['activity'] .= "<tr><td>" . $key . "</td><td>" . $thisStock . "</td></tr>";
		}
		$this->data['activity'] .= "</table>";

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
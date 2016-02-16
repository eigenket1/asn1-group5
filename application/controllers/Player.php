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
		$this->data['pagebody'] = 'playerpage';
		$this->render();
	}

	function get($playerName)
	{
		$this->data['pagebody'] = 'playerpage';
		$this->render();
	}

}
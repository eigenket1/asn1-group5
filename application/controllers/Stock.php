<?php

/**
 * Stock page
 *
 * controllers/Stock.php
 *
 * ------------------------------------------------------------------------
 */
class Stock extends Application
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
		$this->data['pagebody'] = 'stockpage';
		$this->render();
	}

	function get($stockName)
	{
		$this->data['pagebody'] = 'stockpage';
		$this->render();
	}

}
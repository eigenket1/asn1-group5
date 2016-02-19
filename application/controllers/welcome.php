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
	}

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------

	function index()
	{
		$this->data['pagebody'] = 'homepage';
		$this->data['stocklist'] = $this->getStocks();
		$this->data['playerlist'] = $this->getPlayers();
		$this->render();
	}
	
	function getStocks()
	{
		$result = $this->stocks->getCodes();
		$tablestring = "<tr><td>Code</td></tr>";
		
		foreach($result->result() as $row)
		{
			$tablestring .= "<tr><td><a href=\"stocks\"";
			$tablestring .= $row->Code;
			$tablestring .= "\">";
			$tablestring .= $row->Code;
			$tablestring .= "</a></td></tr></br>";
		}
		
		return $tablestring;
	}
	
	function getPlayers()
	{
		// not yet implemented
		//$result = $this->players->getPlayers();
		/*
		$tablestring = "<table>";
		$tablestring .= "<tr><td>Player</td></tr>";
		
		foreach($result->result() as $row)
		{
			$tablestring .= "<tr><a href=\"";
			$tablestring .= $row.name;
			$tablestring .= "\">";
			$tablestring .= $row.name;
			$tablestring .= "</a></tr>";
		}
		
		$tablestring .= "</table>";
		*/
		$tablestring = "";
		return $tablestring;
		
	}
	
}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
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
		$this->data['dropdown'] = $this->getDropdown();
		$this->data['table'] = $this->parsetable($this->getMostRecent());
		$this->render();
	}

	function get($stockName)
	{
		$this->data['pagebody'] = 'stockpage';
		$this->data['dropdown'] = $this->getDropdown();
		$this->data['table'] = $this->parsetable($stockName);
		$this->render();
	}

	function getMostRecent() {
		$results = $this->stocks->getRecentCode();

		foreach ($results->result() as $row) {
			return $row->Code;
		}
	}

	function parsetable($stockcode) {
		$results = $this->stocks->getStocks($stockcode);

		$tablestring = "<table>";

		$tablestring .= "<tr>";

		$tablestring .= "<td>Code</td><td>Time</td><td>Action</td><td>Peanuts</td>";

		$tablestring .= "</tr>";

		foreach ($results->result() as $row) {
			$tablestring .= "<tr>";

			$tablestring .= "<td>";
			$tablestring .= $row->Code;
			$tablestring .= "</td>";
			$tablestring .= "<td>";
			$tablestring .= $row->Datetime;
			$tablestring .= "</td>";
			$tablestring .= "<td>";
			$tablestring .= $row->Action;
			$tablestring .= "</td>";
			$tablestring .= "<td>";
			$tablestring .= $row->Amount;
			$tablestring .= "</td>";

			$tablestring .= "</tr>";
		}

		$tablestring .= "</table>";
		return $tablestring;
	}

	function getDropdown() {
		$results = $this->stocks->getCodes();

		$dropdownstring = "<select name=\"stockChoice\" onchange=\"this.form.submit()\">";
		$dropdownstring .= "<option value=\"\">Select a Stock</option>";

		foreach ($results->result() as $row) {
			$dropdownstring .= "<option value=\"";
			$dropdownstring .= $row->Code;
			$dropdownstring .= "\">";
			$dropdownstring .= $row->Code;
			$dropdownstring .= "</option>";
		}

		$dropdownstring .= "</select>";

		return $dropdownstring;
	}

	public function getSpecificStock()	{
	    $stock = $this->input->get('stockChoice');
	    redirect("stock/$stock");
	}
}

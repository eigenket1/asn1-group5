<?php
class Stocks extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('stocks', 'Code');
    }

    function getStocks($stockcode) {
        $querystring = "SELECT * FROM `movements` WHERE `Code` = '";
        $querystring .= $stockcode;
        $querystring .= "' ORDER BY Datetime DESC";
        $result = $this->db->query($querystring);

        return $result;
    }


    function getCodes() {        
        $result = $this->db->query("SELECT COUNT(*) AS `Rows`, `Code` FROM `stocks` GROUP BY `Code` ORDER BY `Code`");

        return $result;
    }

    function getRecentCode() {
        $querystring = "SELECT * FROM `movements` WHERE 1 ORDER BY Datetime DESC";
        $result = $this->db->query($querystring);

        return $result;
    }
	
	function getStockValue($stockcode) {
		$querystring = "SELECT `Value` FROM `stocks` WHERE `Code` = '";
		$querystring .= $stockcode;
		$querystring .= "'";
		$result = $this->db->query($querystring);
		
		return $result;
	}
}
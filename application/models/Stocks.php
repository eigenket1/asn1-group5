<?php
class Stocks extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('stocks', 'Code');
    }

	function getStocks($stockCode) {
		$queryString = "SELECT * FROM `movements` WHERE `Code` = '";
		$queryString .= $stockCode;
		$queryString .= "' ORDER BY Datetime DESC";
		$result = $this->db->query($queryString);

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
}
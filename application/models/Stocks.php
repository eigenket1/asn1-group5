<?php

class Stocks extends MY_Model
{

    // constructor
    function __construct()
    {
        parent::__construct('stocks', 'Code');
    }

    /**
     * Returns all stock movements for the $stockCode specified
     *
     * @param $stockCode
     * @return mixed
     */
    function getStocks($stockCode)
    {
        $queryString = "SELECT * FROM `movements` WHERE `Code` = '";
        $queryString .= $stockCode;
        $queryString .= "' ORDER BY Datetime DESC";
        $result = $this->db->query($queryString);

        return $result;
    }

    /**
     * Returns a list of unique stock codes available in the database
     *
     * @return mixed
     */
    function getCodes()
    {
        $result = $this->db->query("SELECT COUNT(*) AS `Rows`, `Code`, `Value` FROM `stocks` GROUP BY `Code` ORDER BY `Code`");

        return $result;
    }

    /**
     * Returns the most recently 'active' stock as determined by the 'movements' db table
     *
     * @return mixed
     */
    function getRecentCode()
    {
        $querystring = "SELECT * FROM `movements` WHERE 1 ORDER BY Datetime DESC";
        $result = $this->db->query($querystring);

        return $result;
    }

    /**
     * Returns the most recent $numberOfMovements stock movements
     *
     * @return mixed
     */
    function getRecentMovements($numberOfMovements)
    {
        $querystring = "SELECT * FROM `movements` WHERE 1 ORDER BY Datetime DESC LIMIT " . $numberOfMovements;
        $result = $this->db->query($querystring);

        return $result;
    }

    /**
     * Returns the value of specified $stockCode
     *
     * @param $stockCode
     * @return mixed
     */
    function getStockValue($stockCode)
    {
        $queryString = "SELECT * FROM `stocks` WHERE `Code` = '";
        $queryString .= $stockCode;
        $queryString .= "'";
        $result = $this->db->query($queryString);

        return $result;
    }

    /**
     * Returns all the transactions associated with the specified $stockCode
     *
     * @param $stockCode
     * @return mixed
     */
    function getTransactions($stockCode)
    {
        $queryString = "SELECT * FROM `transactions` WHERE Stock = \"";
        $queryString .= $stockCode;
        $queryString .= "\" ORDER BY Datetime DESC";
        $result = $this->db->query($queryString);

        return $result;
    }

    /**
     * Returns the $numberOfTransactions most recent transactions
     *
     * @param $stockCode
     * @return mixed
     */
    function getRecentTransactions($stockCode)
    {
        $queryString = "SELECT * FROM `transactions` ORDER BY Datetime DESC LIMIT " . $stockCode;
        $result = $this->db->query($queryString);

        return $result;
    }

}
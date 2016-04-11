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
        session_start();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index()
    {
        $this->renderStockPage();
    }

    function get($stockName)
    {
        $this->renderStockPage($stockName);
    }

    function renderStockPage($stockName = null)
    {
        if ($stockName == null) {
            $stockName = $this->getMostRecent();
        }

        $this->data['pagebody'] = 'stockpage';

        $this->data['dropdownCodes'] = $this->stocks->getCodes()->result();
        $this->data['currentStock'] = $this->stocks->getStockValue($stockName)->result();
        $this->data['currentMovements'] = $this->stocks->getStocks($stockName)->result();
        $this->data['currentTransactions'] = $this->stocks->getTransactions($stockName)->result();

        $this->render();
    }

    function getMostRecent()
    {
        $results = $this->stocks->getRecentCode();
        foreach ($results->result() as $row) {
            return $row->Code;
        }
    }

    public function getSpecificStock()
    {
        $stock = $this->input->get('stockChoice');
        redirect("stock/$stock");
    }
}

<?php

/**
 * This represents the current game round, which abstracts to the API server.
 *
 * Is named singular on purpose, unlike other models, because of Game's individual nature.
 */
class Game extends MY_Model
{

    // constructor
    function __construct()
    {
        parent::__construct('game', 'Game');
    }

    /**
     * Get the status XML data of the game from the API
     *
     * @return array
     */
    function getStatus()
    {
        $url = API_URL . 'status';
        $xml = simplexml_load_file($url);
        return array(
            array(
                'round' => $xml->round,
                'state' => $xml->state,
                'desc' => $xml->desc
            )
        );
    }

    function registerUser($userTeam, $userName, $userPassword)
    {
        $this->rest->initialize(array('server' => API_URL));
        return $this->rest->get(
            'register?team=' . $userTeam . '&user=' . $userName . '&password=' . 'Tuesday'
        );
    }

}
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
	
	/**
     * Adds a player to the DB
     *
     * @param string $userTeam  
	 * @param string $userName
	 * @param string $userPassword
     * @return mixed
     */
    function registerUser($userTeam, $userName, $userPassword)
    {
        $this->rest->initialize(array('server' => API_URL));
		
		$queryString = "INSERT INTO `players` (Team, Player, Password)".
			" VALUES ('$userTeam','$userName','$userPassword')";
			
		$this->db->query($queryString);
        return $this->rest->get(
            'register?team=' . $userTeam . '&user=' . $userName . '&password=' . $userPassword
        );
    }

}
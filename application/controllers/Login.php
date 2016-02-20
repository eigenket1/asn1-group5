<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 *
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Login extends Application
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    /**
     * Display normal login page
     */
    function index()
    {
        $this->data['pagebody'] = 'login';
        $this->render();
    }

    /**
     * Process fake user login
     */
    function login()
    {
        $_SESSION['player'] = $_POST['player'];
        redirect("/");
    }

    /**
     * Process user logout
     */
    function logout()
    {
        $_SESSION['player'] = '';
        redirect("/");
    }

}

/* End of file Login.php */

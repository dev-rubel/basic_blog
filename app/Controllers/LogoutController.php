<?php

class LogoutController extends Controller
{
    public function __construct() 
    {   
        parent::__construct();
        if (!isset($_SESSION["admin"])) { 
            header("location: login");
        }
    }

    public function index()
    {
        session_destroy();
        header("location:  login");
    }

}
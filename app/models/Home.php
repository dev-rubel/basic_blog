<?php
require_once __DIR__.'/../core/DB.php';

class Home
{
    public $title = 'Home Page';

    public $db;

    public function __construct() {
	    $this->db = new DB();
    }

    public function getAll()
    {
    	return $this->db->query('SELECT * FROM user')->fetchAll();
    }
}
<?php

class Login
{
    public $title = 'Login Page';

    public function getAll()
    {
    	return $this->db->query('SELECT * FROM user')->fetchAll();
    }
}
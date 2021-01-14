<?php

class RegController extends Controller
{
    public function __construct() 
    {   
        parent::__construct();
        if (isset($_SESSION["admin"])) { 
            header("location: home/index");
        }
    }

    public function index()
    {
        $title = 'Registration Page';
        $this->view('reg', ['title' => $title]);
    }

    public function reg()
    {
        if (isset($_POST["reg"])) {
            $username = $_POST["username"];
            $first = $_POST["first"];
            $last = $_POST["last"];
            $userType = 'user';
            $password = md5($_POST["password"]);

            $query = $this->db->query("INSERT INTO user(first, last, username, user_type, password) VALUES('$first', '$last', '$username', '$userType', '$password') ");
            if ($query) {
                header("location: ".BASE_URL.'login');
            }
        }
    }
}
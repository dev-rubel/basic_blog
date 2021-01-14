<?php

class LoginController extends Controller
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
        $login = $this->model('Login');
        $title = 'Login Page';
        $this->view('login', ['login' => $login, 'title' => $title]);
    }

    public function login()
    {
        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = md5($_POST["password"]);
            $row = $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
            $row = $row->fetchArray();
            if (!$row) {
                $message = "<p style='background:red;color:white;font-weight:bold;text-align:center;'>Admin not found, Try again</p>";
                $_SESSION['message'] = $message;
                header("location: ".BASE_URL);

            } else {
                $message = 'success';
                $user = $row["first"]." ".$row["last"];
                $name = $row['username'];
                $userType = $row['user_type'];
                $_SESSION['admin'] = $name;
                $_SESSION["id"] = $row['id'];
                $_SESSION["user"] = $user;
                $_SESSION["user_type"] = $userType;
                header("location: ".BASE_URL.'home');
            }
        }
    }
}
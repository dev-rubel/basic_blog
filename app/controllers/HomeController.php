<?php

class HomeController extends Controller
{
    public $sitedetails;

    public function __construct() 
    {   
        parent::__construct();
        if (!isset($_SESSION["admin"])) { 
            header("location: login");
        }
        $this->sitedetails = $this->db->query('SELECT * FROM sitedetails')->fetchArray();
    }

    public function addfeed()
    {
        $title = 'Add Feed';
        $this->view('admin/addfeed', ['title' => $title]);
    }

    public function feedEngag($postId, $pointType = '')
    {
        $query2 = $this->db->query("SELECT engag FROM post WHERE id='$postId'");
        $engag = $query2->fetchArray()['engag']+$this->sitedetails[$pointType];
        $query3 = $this->db->query("UPDATE post SET engag='$engag' WHERE id='$postId' ");
        return $query3->affectedRows();
    }

    public function feedlike()
    {
        $link_array = explode('/', CURRENT_URL);
        $id = end($link_array);
        if(!is_numeric($id)) {
            header('location: '.BASE_URL.'home/all');
        }
        $userId = $_SESSION['id'];
        $postId = $id;

        $userLikeQuery = $this->db->query("SELECT * FROM post_likes WHERE post_id='$postId' AND user_id='$userId'");
        if($userLikeQuery->numRows() > 0) {
            $_SESSION['message'] = 'Already Liked.';
            header('location: '.BASE_URL.'home/single/'.$postId);
        }

        $query1 = $this->db->query("INSERT INTO post_likes(post_id, user_id) VALUES('$postId','$userId') ");
        $this->feedEngag($postId, 'like_point');

        $_SESSION['message'] = 'Liked.';
        header('location: '.BASE_URL.'home/single/'.$postId);
    }

    public function feedshare()
    {
        $postId = $_POST['postId'];
        echo $this->feedEngag($postId, 'share_point');
    }

    public function insertfeed()
    {
        if (isset($_POST['submit'])) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $image = time().'_'.$_SESSION['id'].'.'.$ext;   
            $destination_path = getcwd().DIRECTORY_SEPARATOR;
            $target = $destination_path."image/".basename($image);

            // storing in database
            $userId = $_SESSION['id'];
            $text = $this->db->escape_string($_POST['text']);
            $category = $_POST['category'];
            $title = $_POST['title'];
            $date = date("F j, Y");

            $query = $this->db->query("INSERT INTO post(image, user_id, text, category, title, date) VALUES('$image', '$userId', '$text', '$category', '$title', '$date') ");
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $query = $this->db->query("SELECT * FROM post ORDER BY id DESC LIMIT 1");
                $row = $query->fetchArray();
                $posted = "<p style='color:white;background:green;padding:5px;text-align:left;'>Posted Successfully <a style='float: right;text-decoration: underline;background: white;color: green;padding: 1px;font-weight: bold;' href='".BASE_URL.'home/single'.$row['id']."'>View Post</a></p>";
            } else {
                $posted = "<p style='color:white;background:red;padding:5px;border-radius:5px;text-align:center;'>Post Error!!!</p>";
            }
            $_SESSION['message'] = $posted;
            header("location: ".BASE_URL.'home/allfeed');
        }
    }

    public function index()
    {
        $home = $this->model('Home');
        $this->view('admin/dashboard', ['title' => $home->title]);
    }

    public function all()
    {
        $link_array = explode('/', CURRENT_URL);
        $page = end($link_array);
        $pageno = is_numeric($page)?$page:1;
        $title = 'All News Feed';
        $this->view('admin/allfeed', ['title' => $title, 'pageno' => $pageno]);
    }

    public function single()
    {
        $link_array = explode('/', CURRENT_URL);
        $id = end($link_array);
        if(!is_numeric($id)) {
            header('location: '.BASE_URL.'home/all');
        }

        $title = 'Single Feed';
        $this->view('admin/singlefeed', ['title' => $title, 'id' => $id]);
    }

    public function singleedit()
    {
        $link_array = explode('/', CURRENT_URL);
        $id = end($link_array);
        if(!is_numeric($id)) {
            header('location: '.BASE_URL.'home/all');
        }

        $title = 'Single Feed Edit';
        $this->view('admin/singlefeededit', ['title' => $title, 'id' => $id]);
    }

    public function search()
    {
        $title = $_POST['title'];
        return $this->view('inc/search', ['title' => $title]);
    }

    public function comment()
    {
        if (isset($_POST['submit'])) {
            $userId = '';
            $name = $_POST['name'];
            $postid = $_POST['postid'];
            $message = $_POST['message'];
            if(isset($_POST['user_id']))  {
                $userId = $_POST['user_id'];
            }
            if (empty($name)) {
                $_SESSION['message'] = 'Please enter name.';
                header("location: ".BASE_URL.'home/single/'.$postid); die();
            }
            if (empty($message)) {
                $_SESSION['message'] = 'Please enter comment description.';
                header("location: ".BASE_URL.'home/single/'.$postid); die();
            }
            $query = $this->db->query("INSERT INTO comment(name, user_id, message, postid) VALUES('$name', '$userId', '$message', '$postid') ");
            if ($query->lastInsertID()) {
                $this->feedEngag($postid, 'comment_point');
                $_SESSION['message'] = 'Comment Submit.';
                header("location: ".BASE_URL.'home/single/'.$postid);
            }
        }
    }

    public function settings()
    {
        // onliy admin can access
        if ($_SESSION["user_type"] != 'admin') {
            header('location: '.BASE_URL.'home');
        }

        $title = 'Site Settings';
        return $this->view('admin/setting', ['title' => $title]);
    }

    public function getPageFeed()
    {
        $pageno = $_POST['per_page'];
        $no_of_records_per_page = $this->sitedetails["per_page"];
        $offset = ($pageno-1) * $no_of_records_per_page;
        $query = $this->db->query("SELECT *, 1/TIMESTAMPDIFF(MINUTE, datetime, NOW())+engag AS age FROM post ORDER BY age DESC LIMIT $offset, $no_of_records_per_page");
        echo $this->view('admin/dynamicfeed', ['query' => $query]);
    }

    public function updatesetting()
    {
        // onliy admin can access
        if ($_SESSION["user_type"] != 'admin') {
            header('location: '.BASE_URL.'home');
        }

        if (isset($_POST['update'])) {
            $id = 1;
            $title = $_POST['title'];
            $text = $_POST['text'];
            $per_page = $_POST['per_page'];
            $like_point = $_POST['like_point'];
            $comment_point = $_POST['comment_point'];
            $share_point = $_POST['share_point'];

            $query = $this->db->query("UPDATE sitedetails SET sitetitle='$title', sitetagline='$text', per_page='$per_page', like_point='$like_point', comment_point='$comment_point', share_point='$share_point' WHERE id='$id' ");

            if ($query) {
                $posted = "<p style='color:white;background:green;padding:5px;border-radius:5px;text-align:center;'>Posted Successfully <br><span>Refresh the page to see result!</span></p>";
                $_SESSION['message'] = $posted;
                header("location: ".BASE_URL.'home/settings');
            }else{
                $posted = "<p style='color:white;background:red;padding:5px;border-radius:5px;text-align:center;'>Post Error!!!</p>";
                $_SESSION['message'] = $posted;
                header("location: ".BASE_URL.'home/settings');
            }
        }
    }

    public function changelogo()
    {
        if (isset($_POST['updatelogo'])) {
            $destination_path = getcwd().DIRECTORY_SEPARATOR;
            $target = $destination_path."image/".basename($_FILES['image']['name']);

            $image = $_FILES['image']['name'];      
            $id = 1;
            $query = $this->db->query("UPDATE sitedetails SET sitelogo='$image' WHERE id='$id' ");
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $posted = "<p style='color:white;background:green;padding:5px;border-radius:5px;text-align:center;'>Image change Successfully<br><span>Refresh the page to see result!</span></p>";
                $_SESSION['message'] = $posted;
                header("location: ".BASE_URL.'home/settings');
            }else{
                $posted = "<p style='color:white;background:red;padding:5px;border-radius:5px;text-align:center;'>Image change error Error!!!</p>";
                $_SESSION['message'] = $posted;
                header("location: ".BASE_URL.'home/settings');
            }
        }
    }

    public function changesinglefeedimg()
    {
        if (isset($_POST['updatelogo'])) {  
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $image = time().'_'.$_SESSION['id'].'.'.$ext;    
            $destination_path = getcwd().DIRECTORY_SEPARATOR;   
            $target = $destination_path."image/".basename($image);
            $id = $_POST['id'];
            $previous_img = $_POST['previous_img'];
            $previous_target = $destination_path."image/".$previous_img;
            if (file_exists($previous_target)){
                if (unlink($previous_target)) {   
                    $posted = "success";
                } 
            }

            $query = $this->db->query("UPDATE post SET image='$image' WHERE id='$id'");

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $_SESSION['posted'] = "<p style='color:white;background:green;padding:5px;border-radius:5px;text-align:center;'>Image change Successfully<br><span>Refresh the page to see result!</span></p>";
            } else {
                $_SESSION['posted'] = "<p style='color:white;background:red;padding:5px;border-radius:5px;text-align:center;'>Image change error Error!!!</p>";
            }
            header("location: ".BASE_URL.'home/singleedit/'.$id);
        }
    }

    public function updatesinglefeed()
    {
        $id = $_POST['id'];
        $userType = $_SESSION['user_type'];
        $userId = $_SESSION['id'];
        $userPost = $userType=='user'?" AND user_id=$userId":"";
        // single post
        $query = $this->db->query("SELECT * FROM post WHERE id='$id' $userPost");
        $postCount = $query->numRows();
        // unable to acces anoter user post
        if(!$postCount) {
            header("location: ".BASE_URL.'home/allfeed');
        }
        $row = $query->fetchArray();

        if (isset($_POST['update'])) {
            $title = $_POST['title'];
            $category = $_POST['category'];
            $text = $this->db->escape_string($_POST['text']);

            $userId = $row['user_id']!=null?$row['user_id']:$_SESSION['id'];

            if($_SESSION['user_type'] == 'admin') {
                if(isset($_POST['featured'])){
                    $featured = 1;              
                } else {
                    $featured = 0;
                }
            } else {
                $featured = $row['featured'];
            }

            $query = $this->db->query("UPDATE post SET title='$title', user_id='$userId', category='$category', text='$text', featured='$featured' WHERE id='$id' ");
            if ($query) {
                $_SESSION['posted'] = "<p style='color:white;background:green;padding:5px;border-radius:5px;text-align:center;'>Updated successfully <br><span>Refresh the page to see result!</span></p>";
            } else {
                $_SESSION['posted'] = "<p style='color:white;background:red;padding:5px;border-radius:5px;text-align:center;'>Post Error!!!</p>";
            }
            header("location: ".BASE_URL.'home/singleedit/'.$id);
        }
    }

    public function singledelete()
    {
        $link_array = explode('/', CURRENT_URL);
        $id = end($link_array);
        if(!is_numeric($id)) {
            header('location: '.BASE_URL.'home/all');
        }

        $userType = $_SESSION['user_type'];
        $userId = $_SESSION['id'];
        $userPost = $userType=='user'?" AND user_id=$userId":"";

        $query = $this->db->query("SELECT * FROM post WHERE id='$id' $userPost");
        $postCount = $query->numRows();

        // unable to acces anoter user post
        if(!$postCount) {
            header('location: '.BASE_URL.'home/all');
        }
        $row = $query->fetchArray();
        $destination_path = getcwd().DIRECTORY_SEPARATOR;  
        $previous_target = $destination_path."image/".$row['image'];

        if (file_exists($previous_target)){
            if (unlink($previous_target)) {   
                $posted = "success";
            } 
        }
        $this->db->query("DELETE FROM post WHERE id='$id' ");
        $this->db->query("DELETE FROM comment WHERE postid='$id' ");
        header('location: '.BASE_URL.'home/all');
    }
}
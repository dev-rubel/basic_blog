
<?php
// get the q parameter from URL
    $q = $title;
    $query = $this->db->query("SELECT * FROM post WHERE title LIKE '%{$q}%' LIMIT 5 ");
    // dump($query->numRows());

    if ($query->numRows() < 1) {
        echo "No Result Found, Try Again";
    } else {
       foreach ($query->fetchAll() as $row) {
        echo "<style>.searlist:hover{box-shadow:1px 1px 2px 2px blueviolet;}</style>";
       		echo "<a style='color: white;font-weight: normal;' href='post.php?id=".$row['id']."'><div class='searlist' style='background:url(image/".$row['image'].");height: 30px;width: 40px;background-position: center top;background-size: cover;background-repeat: no-repeat;margin-left: 2px;float: left;margin-right: 10px;border: 2px solid blueviolet;'></div><p style='text-align: left;font-weight: bold;background:transparent;color:black;'>".$row["title"]."</p></a><br>";
       }
    }

?> 
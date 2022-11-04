

<?php
require 'dbconnect.php';
 
if(isset($_POST['user_name']) && isset($_POST['pass_word']) && isset($_POST['id'])){

    $query_title = $_POST['user_name'];
    $query_desc = $_POST['pass_word'];
    $id = $_POST['id'];
    
    if (!empty($query_title) && !empty($query_desc)) {
         $method = $_SERVER['REQUEST_METHOD'];
         if ($method == 'POST') {
            $id = $_POST['id'];
           
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$query_title', '$query_desc', '$id', '0', current_timestamp());";
            if(mysqli_query($mycon, $sql)){
               echo true;
            }
            else {
                echo 0;
            }
            
        
    } else {
        echo 'all fields required';
    }
  }
}

?>


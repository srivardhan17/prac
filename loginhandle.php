 <?php

   
include 'dbconnect.php';

if(isset($_POST['username']) &&  isset($_POST['password'])){
    $username=$_POST['username'];
    $current_ps=$_POST['password'];
    $pass_hash = md5($current_ps);
    if(!empty($current_ps) && !empty($username)){
        
        $query="SELECT `id` FROM `users` WHERE  `username`='$username' AND `password`= '$pass_hash'";
        if($query_run=mysqli_query($mycon,$query)){
            $num_rows=mysqli_num_rows($query_run);
            
            if($num_rows==1){
            $rows=mysqli_fetch_row($query_run);
            $id=$rows[0];
            
            $_SESSION['user_id']=$id;
            // header('Location:  $_SERVER["PHP_SELF"]');
           echo '<script> 
             location.replace("index.php");
                  </script>';
            
          }
            if($num_rows==0){
                echo '<div class="alert alert-danger" role="alert">
                Your password was incorrect please try again...
              </div>';
            }
        }
         
           
        
    
        
    }
    else {
        echo 'All fields are required';
    }
}
?>

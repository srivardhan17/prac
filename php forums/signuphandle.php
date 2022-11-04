<?php
include 'dbconnect.php';
//include 'loginhandle.php';
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name'])){
       
    $user_name=$_POST['username'];
    $password=$_POST['password'];
    $firstname=$_POST['first_name'];
    $lastname=$_POST['last_name'];
    $pass_hash=md5($password);
    

    if(!empty($user_name) && !empty($password) && !empty($firstname)&& !empty($lastname)){
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
             $sql="SELECT `username` FROM `users` WHERE `username`='$user_name'";
            if($query_run= mysqli_query($mycon,$sql)){
                $num_rows= mysqli_num_rows($query_run);
                if($num_rows==1){
                    echo '<div class="alert alert-danger" role="alert">
                    Username already exists...
                  </div>';
                }
                else if($num_rows == 0){
                    $query ="INSERT INTO `users` (`id`,`username`,`password`,`firstname`,`surname`) VALUES (NULL,'$user_name','$pass_hash','$firstname','$lastname')";
                    if($query_run= mysqli_query($mycon,$query)){
                         
                         echo '<div class="alert alert-success" role="alert">
                         You registerd successfully...
                       </div>';
                        


                    }
                    
                }
                
            }
            
        

          
            






        }
     
    }
   else {
    echo '<div class="alert alert-danger" role="alert">
   <b> All fields are required..</b>
  </div>';
   }

}

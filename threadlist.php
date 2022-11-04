<?php
include 'logintest.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i-Discuss</title>
    <!-- Ajax call -->
    <style>
        .p-form {

            display: flex;

        }

        #addform {
            width: 100%;

        }

        .display-4 {
            font-weight: bold;
            font-size: 3rem;

        }

        hr {
            border: none;
            background-color:black;
           
        }
        #user{
            border: 2px solid black;
            
        }
        #pass{
            border: 2px solid black;
            
        }
        p.text{
         font-size: medium;
         color: black;

        }
        .form-label{
            font-size:15px;
            font-weight:400;
        }
        p a{
        text-decoration: none;
        color: black;
        } 
    </style>

</head>
<body>
<?php



   include 'dbconnect.php';
   $id=$_GET['catid'];

   $sql="SELECT * FROM `threads` WHERE `thread_id`='$id'";
   $result =mysqli_query($mycon,$sql);

   $noresult=true;
  
   for($i=0;$i<$row=mysqli_fetch_assoc($result);$i++){
       
      $noresult=false;
  
    
       $thread_id=$row['thread_id'];
       $thread_cat_title=$row['thread_title'];
       $thread_cat_desc=$row['thread_desc'];
    }
    $sql2="SELECT * FROM `threads` WHERE `thread_id`='$id'";
    $result =mysqli_query($mycon,$sql2);
    while($row=mysqli_fetch_assoc($result)){
       
      $thread_user_id=$row['thread_user_id'];
   

    }
    if($noresult){
        echo '<b>You are first one to be here.please post your comments</b>';
    }
    else {

    }
    
?>
<?php
    if(isset($_POST['user_mail']) && isset($_POST['comment'])){
        $user_name=$_POST['user_mail'];
        $comment=$_POST['comment'];
       
         
    if(!empty($user_name) && !empty($comment)){
     $method=$_SERVER['REQUEST_METHOD'];
     if($method=='POST'){
        $id=$_GET['catid'];
        
        $sql="INSERT INTO `comments` (`comment_desc`, `comment_user_name`, `timestamp`, `query_id`) VALUES ('$comment', '$user_name', current_timestamp(), '$id');";
        if($upd_query_run=mysqli_query($mycon,$sql)){
           echo 'Your comment is successfull'; 
        }

     }
    } 
    else{
        echo 'error';
    }
    
    }
 


?>
<div class="container my-4 " style="background-color:white;">
    <div class="jumbotron">
        <h1 class="display-4"><?php echo $thread_cat_title?></h1>
        <p class="lead"> </p>
        <hr class="my-4">
        <p><?php echo $thread_cat_desc?></p>
        <p>Posted by: <?php echo  $thread_user_id?></p>
    </div>

</div>
  <?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
     echo '<div class="container post">
     <h2>Post your comment</h2>
     <hr>
     <form id="addform">
     <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Enter Your Email</label>
        <input type="text" name="user_mail" class="form-control"  id="user"/ placeholder="Email address">
        </div>
     <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Your Comment</label>
        <textarea class="form-control" name="comment" id="pass" rows="3"></textarea>
     </div>
     <input type="submit" id="load" class="btn btn-primary"></input>
     </form>
 
 </div>';

  }
  else {
      echo '';
  }
  ?>



<div class="container">

    <?php
   
   $id=$_GET['catid'];
   $sql="SELECT * FROM `comments` WHERE `query_id`='$id'";
   $result =mysqli_query($mycon,$sql);

   $noresult=true;
  
   for($i=0;$i<$row=mysqli_fetch_assoc($result);$i++){
       
      $noresult=false;
  
      
       $comment_id=$row['comment_id'];
       $comment =$row['comment_desc'];
       $user_name=$row['comment_user_name'];
       $query_id=$row['query_id'];
     
      echo '
      <div class="d-flex align-items-center">
          <img src="http://localhost/tcwphp/php%20forums/user1.png" width="32px" height="32px" alt="">
          <div class="flex-shrink-0">
  
          </div>
          <div class="flex-grow-1 ms-3">
              <h5>'.$user_name.'</h5>
              <p>'.$comment.'</p>
          </div>
      </div>
   ';

    }
    
    ?>
</div>
</body>
</html>


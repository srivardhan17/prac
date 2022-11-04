<?php
      include 'logintest.php';
      
      include 'dbconnect.php';

      $id=$_GET['catid']; 
      
      $sql="SELECT * FROM `i-discuss` WHERE `cat_id`='$id'";
      $result =mysqli_query($mycon,$sql);
      while($row=mysqli_fetch_assoc($result)){
          $thread_id=$row['cat_id'];
          $thread_title=$row['cat_name'];
          $thread_desc=$row['cat_desc'];
 }
   
?>
<div class="container my-4 " style="background-color:lightgrey;">
    <div class="jumbotron">
        <h1 class="display-4">welcome to <?php echo $thread_title?> threads</h1>
        <p class="lead"> </p>
        <hr class="my-4">
        <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post
            copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions.
            Remain respectful of other members at all times.</p>
        <p>Posted by: <b>sri vardhan</b></p>
    </div>

</div>
<?php 

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
   echo '<div class="container ask-question">
   <h4>Ask your query</h4>
   <hr>
   <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
       <div class="mb-2  mx-0">

           <label for="exampleFormControlInput1" class="form-label"><b>Query Title</b></label>
           <input type="text" class="form-control" id="exampleFormControlInput1" name="query_title"
               placeholder="xyz@123.com">
       </div>
       <div class="mb-3 ">
           <label for="exampleFormControlTextarea1" class="form-label"><b>Query
                   Description</b></label>
           <textarea class="form-control " id="exampleFormControlTextarea1" name="query_desc" rows="3"></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Submit</button>
   </form>
</div>';
}
else{
    echo '<div class="container"><div class="alert alert-secondary" role="alert">
    <h4>Please log in to ask your queries...<h4>
  </div></div>' ;
}
?>



<div class="container">
    <h1>Browse Questions</h1>

    <?php
   
   $id=$_GET['catid'];
   $sql="SELECT * FROM `threads` WHERE `thread_cat_id`='$id'";
   $result =mysqli_query($mycon,$sql);

   $noresult=true;
  
   for($i=0;$i<$row=mysqli_fetch_assoc($result);$i++){
       
      $noresult=false;
  
      
      echo  $thread_list_id=$row['thread_id'];
      echo  $thread_title=$row['thread_title'];
      echo $thread_desc=$row['thread_desc'];
       
     
      echo '
      <div class="d-flex align-items-center">
          <img src="http://localhost/tcwphp/php%20forums/user1.png" width="32px" height="32px" alt="">
          <div class="flex-shrink-0">
  
          </div>
          <div class="flex-grow-1 ms-3 id="thread">
              <h5 id="thread_title"><a href="threadlist.php?catid='.$thread_list_id.'">'.$thread_title.'</a></h5>
              <p>'.$thread_desc.'</p>
          </div>
      </div>';
      }
      if($noresult=='true'){
          echo '<b>You are first one to be here.please start discussion..</b>';
      }
      else {

      }
      
      
?>
    <?php
     
    if(isset($_POST['query_title']) && isset($_POST['query_desc'])){
       
        $query_title=$_POST['query_title'];
        $query_desc=$_POST['query_desc'];

        if(!empty($query_title) && !empty($query_desc)){
            $method=$_SERVER['REQUEST_METHOD'];
            if($method=='POST'){
                $id=$_GET['catid'];
                $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$query_title', '$query_desc', '$id', '0', current_timestamp());";
                $result =mysqli_query($mycon,$sql);

            }
         


       }
       else {
           echo 'all fields required';
       }
      
    }
    
         
?>
</div>


</script>

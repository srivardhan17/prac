<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
</head>

<body>
    <!-- loginhandle -->
    <form id="addform">
        <input type="text"  id="user">
        <input type="pass" id="pass" >
        <input type="submit" id="load" value="save">
     </form>
     <div id="display">
        
     </div>
     <div id="test"></div>

</body>
<!--J QUERY-->
<script  type="text/javascript" src="JS/jquery.js"></script>
<script type="text/javascript">
  
    $(document).ready(function(){
       function loaddata(){
        $.ajax({
        url :"threads.php",
        type: "POST",
        success :function(data1){
         
         $("#display").html(data1);
   }


     });
       }
       loaddata();
       $("#load").on("click",function(e){
       e.preventDefault();
       var user_name = $("#user").val();
       var pass_word = $("#pass").val();
       
      $.ajax({
        url :"threadinsert.php",
        type :"POST",
        data :{
               user_name:user_name,
               pass_word:pass_word
            },
        success : function(data){
        
         if (data == 1){
             loaddata();
             $("#addform").trigger("reset");
             alert ("saved record");
         }
         else {
            alert ("cant save record");
         }
        },
         error: function (error) {
                    console.log(`Error ${error}`);
                }
         })


       });



    });


</script>

</html>


<?php
require 'dbconnect.php';
    if(isset($_POST['user_name']) && isset($_POST['pass_word'])){

      $query_title = $_POST['user_name'];
      $query_desc = $_POST['pass_word'];
   
      
  
      if (!empty($query_title) && !empty($query_desc)) {
          // $method = $_SERVER['REQUEST_METHOD'];
          // if ($method == 'POST') {
              // $id = $_GET['catid']=1;
              $id=1;
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
    


?>


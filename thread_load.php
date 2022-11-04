<div class="container">
    <h1>Browse Questions</h1>

    <?php
    require 'dbconnect.php';
    $id = $_GET['id1'];
    $sql = "SELECT * FROM `threads` WHERE `thread_cat_id`='$id'";
    $result = mysqli_query($mycon, $sql);

    $noresult = true;

    for ($i = 0; $i < $row = mysqli_fetch_assoc($result); $i++) {

        $noresult = false;


        $thread_list_id = $row['thread_id'];
        $thread_title = $row['thread_title'];

        $thread_desc = $row['thread_desc'];

      echo '
       
         <div class="d-flex align-items-center">
         
        
          <div class="flex-grow-1 ms-3 id="thread">
          <img src="http://localhost/tcwphp/php%20forums/user1.png" width="32px" height="32px" alt=""> <span>'.$thread_title .'</span></br>
          <p> <a href="threadlist.php?catid='. $thread_list_id .'">' . $thread_desc . '</a></p>
          </div>
         
          </div>
       ';

    
    }
    if ($noresult == 'true') {
        echo '<b>You are first one to be here.please start discussion..</b>';
    } else {
    }
    ?>
</div>
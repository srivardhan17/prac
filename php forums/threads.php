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

    $id = $_GET['catid'];
    // echo $s_id=$_SESSION['card_id'];
    $sql = "SELECT * FROM `i-discuss` WHERE `cat_id`='$id'";
    $result = mysqli_query($mycon, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        //$thread_id = $row['cat_id'];
        $thread_title = $row['cat_name'];
        // $thread_desc = $row['cat_desc'];
    }
    ?>
    <div class="container my-4 " style="background-color:white;">
        <div class="jumbotron">
            <h1 class="display-4">
                <p><?php echo  $thread_title ?> threads</p>
            </h1>
            <!-- <p class="lead"></p> -->
            <hr class="my-4">
          
            <p class="text">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post
                copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions.
                Remain respectful of other members at all times.</p>
            <p>Posted by: <b>sri vardhan</b></p>
        </div>

    </div>
    <?php


    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        echo '<div class="container ask-question">
     <h4>Ask your query</h4>
     <hr>
     <div class="container p-form">
    
    

     <form id="addform">
     <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="user_mail" class="form-control"  id="user"/>
        </div>
     <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="comment" id="pass" rows="3"></textarea>
     </div>
     <input type="submit" id="load" class="btn btn-primary"></input>
     </form>
    </div>
  <div id="display2">
  
  </div>
';
    } else {
        echo '<div class="container"><div class="alert alert-secondary" role="alert">
     <h4>Please log in to ask your queries...<h4>
     </div></div>';
    }
    ?>

    </div>
</body>
<!--J QUERY-->
<script type="text/javascript" src="JS/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        console.log('text');
        let searchParams = new URLSearchParams(window.location.search);
        let id1 = searchParams.get('catid');

        function loaddata() {
            $.ajax({
                url: "thread_load.php",
                type: "GET",
                data: {
                    id1: id1,
                },
                success: function(data1) {

                    $("#display2").html(data1);
                }


            });
        }
        loaddata();
        $("#load").on("click", function(e) {
            e.preventDefault();
            var user_name = $("#user").val();
            var pass_word = $("#pass").val();
            let searchParams = new URLSearchParams(window.location.search);
            let id = searchParams.get('catid');


            $.ajax({
                url: "thread_insert.php",
                type: "POST",
                data: {
                    user_name: user_name,
                    pass_word: pass_word,
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    if (data == 1) {
                        loaddata();
                        $("#addform").trigger("reset");
                        alert("saved record");
                    } else {
                        alert("cant save record");
                    }
                },
                error: function(error) {
                    console.log(`Error ${error}`);
                }
            })


        });



    });
</script>

</html>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>I-Discuss</title>
    <style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    .cards {
        display: flex;
        justify-content: space-around;
    }


    .box {
        display: flex;
        justify-content: flex-end;
    }

    .logout {
        display: flex;
        justify-content: flex-end;

    }

    .logout a {
        text-decoration: none;
        color: white;
        font-family: sans-serif;
        font-weight: 400;
        border: 2px solid blue;
        background-color: blue;
        padding: 5px;
        position: relative;
        margin-right: 5px;
        width: max-content;
        border-radius: 2px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex mx-3">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

        <?php
        include 'core.php';
        $logout= '<div class="logout">
                  <a href="logout.php">log out</a>
                  </div>';
          if(loggedin(true)){
            
            echo $logout;

        }
        else {
        echo '<div class="box">

            <button type="button" class="btn btn-primary mx-(-3)" data-bs-toggle="modal"
                data-bs-target="#loginmodal">login</button>
            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal"
                data-bs-target="#exampleModal">signup</button>
        </div>';
        }
      ?>


    </nav>
    <?php
         include 'signuphandle.php';
    ?>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name='username'
                                aria-describedby="emailHelp" required>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name='password' id="exampleInputPassword1" required>
                        </div>

                        <div class="mb-3">
                            <label for="First Name" class="form-label">First Name</label>

                            <input type="text" class="form-control" id="exampleInputEmail1" name="first_name"
                                aria-describedby="emailHelp"  required>

                        </div>
                        <div class="mb-3">
                            <label for="Last Name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="exampleInputPassword1"  required>
                        </div>



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- login modal -->
    <?php  require 'loginhandle.php';?>
    <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log in</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your username with anyone else.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- slider starts here -->
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <img src="http://localhost/tcwphp/php%20forums/slider2.jpg" height='350vh' class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="http://localhost/tcwphp/php%20forums/slider 1.png" height='350vh' class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="http://localhost/tcwphp/php%20forums/slider3.jpg" height='350vh' class="d-block w-100"
                        alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </div>

    </div>
    <hr style="width:50%; margin-left:auto; margin-right:auto; " ><h3 style="text-align: center; font-weight: 600;">Explore new threads</h3><hr style=" width:50%; margin-left:auto; margin-right:auto;">
    <!-- cards start here -->
    <div class="container">

        <div class="row cards">

            <?php
          
             include 'dbconnect.php';
             $sql='SELECT * FROM `i-discuss`';
             $result = mysqli_query($mycon, $sql);
             while($row = mysqli_fetch_assoc($result)){
                $card_id = $row['cat_id'];
                $_SESSION['$card_id']=$card_id;

                $card_desc=$row['cat_desc'];
                $card_title= $row['cat_name'];
                


                echo '<div class="col-md-4 my-2" id="cards">
                <div class=" col-md-4 card my-3 mx-5" style="width: 18rem;">
                 <img src="http://localhost/tcwphp/php%20forums/card'.$card_id.'.jpg" class="card-img-top" alt="...">
                 <div class="card-body">
              <h5 class="card-title">'.$card_title.'</h5>
              <p class="card-text">'.substr($card_desc, 0, 90).'.....</p>
              <a href="threads.php?catid='.$card_id.'" class="btn btn-primary">View threads</a>
              </div>
                </div>
                 </div>';
                
            }
  ?>



        </div>
    </div>









    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
         -->
</body>
<script type='text/javascript' src='config.js'></script>
<script>

var token = config.MY_API_TOKEN;
var key = config.SECRET_API_KEY;
document.write(token);
    console.log(key);
</script>
</html>

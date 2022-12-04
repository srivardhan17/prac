<?php
  
  $host='localhost';
  $user='root';
  $password=getenv("MY_KEY");
  $database='mydatabase';
echo $password;
  
  if($mycon=mysqli_connect($host,$user,$password)){
	  if(mysqli_select_db($mycon,$database)){
		  
		  
	  }
	  else {
		 echo 'you are not connected to database';
	  }
	  
  }
  else{
	  echo 'you are not connected to server';
  }


?>

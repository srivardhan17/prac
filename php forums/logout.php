<?php
 require 'core.php';
 session_destroy();
 echo '<script>
     location.replace("index.php");
    </script>';

?>
<?php
  include "./dbconnent.php";
   isset($_SESSION['username']);
    unset($_SESSION['username']);
    header("location: index.php ");

?>
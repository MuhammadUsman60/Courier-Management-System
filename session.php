<?php
include "./dbconnent.php";
session_start();


if(isset($_SESSION['email']) && $_SESSION['password']!=true){
  session_start();
  header("location: index.php");
  exit;
}
?>
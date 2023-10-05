<?php
 include './dbconnent.php';
$status = mysqli_real_escape_string($conn, $_POST['status']);
$sc = mysqli_real_escape_string($conn, $_POST['sc']);

// Fix the typo in the UPDATE query and use single quotes around $sc
$sql = "UPDATE orders SET status = '$status' WHERE sc = '$sc'";
$res = mysqli_query($conn, $sql);

// header("location: couriersList.php");
?>

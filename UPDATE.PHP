<?php
include "./dbconnent.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the updated information from the form
    $sno = mysqli_real_escape_string($conn, $_POST['sno']);
    $newName = mysqli_real_escape_string($conn, $_POST['new_name']);
    $newPhone = mysqli_real_escape_string($conn, $_POST['new_phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    // Perform the update query
    $sql = "UPDATE courier_persons 
            SET name = '$newName', phone = '$newPhone' , address = '$address'
            WHERE sno = '$sno'";

    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: CourierPersonsList.php");
    }
    
}
?>
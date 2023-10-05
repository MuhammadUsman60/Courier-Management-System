<?php
include './dbconnent.php';

if(isset($_POST['sno'])) {
   
    $sno = mysqli_real_escape_string($conn, $_POST['sno']);

    $sql = "DELETE FROM courier_persons WHERE sno = '$sno'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: CourierPersonsList.php");     
    } else {
        echo "Error";   
    }

   
} else {
    echo "The 'sno' parameter is not set in the POST request.";
}
?>

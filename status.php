<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $sc = mysqli_real_escape_string($conn, $_POST['sc']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $updateSql = "UPDATE shipper_details SET status = '$status' WHERE sc = '$sc'";
    $result = mysqli_query($conn, $updateSql);

    if ($result) {
        // Status updated successfully
        include "./couriersList.php";
    } else {
        // Error occurred while updating status
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>
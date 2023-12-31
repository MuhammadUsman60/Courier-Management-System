<?php


include './dbconnent.php';



// Retrieve the existing courier person information
if (isset($_POST['sno'])) {
    $sno = mysqli_real_escape_string($conn, $_POST['sno']);
    $sql = "SELECT * FROM courier_persons WHERE sno = '$sno'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
       
    } else {
        echo "Courier person not found.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Courier Person</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>   
<div class="container-fluid pt-4 px-4" style="padding:120px">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6" style="padding:120px">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Update Courier Person</h6>
                            <form method="post" action="UPDATE.php" >
                            <input type="hidden" name="sno" value="<?php echo $row['sno']; ?>">
                            <!-- <form> -->
                                <div class="mb-3">
                                    <label for="Aname" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="new_name" value="<?php echo $row['name']; ?>"><br>
                                </div>
                                <div class="mb-3">
                                    <label for="Arepass" class="form-label">new_phone</label>
                                    <input type="text"  class="form-control" name="new_phone" value="<?php echo $row['phone']; ?>"><br>
                                </div>
                                <div class="mb-3">
                                    <label for="Arepass" class="form-label">address</label>
                                    <input type="text"  class="form-control" name="address" value="<?php echo $row['address']; ?>"><br>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-outline-primary w-100 m-2" type="submit" value="Update">
                                
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
                </div>
                <br><br><br><br>
            </div>
            
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

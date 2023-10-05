<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Booked Page</title>
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
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <?php
        include "spinner.php";
        ?>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <?php
            include "sidebar.php";
            ?>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">

            <!-- Navbar Start -->
            <?php
            include "navbar.php";
            ?>
            <!-- Navbar End -->

            <?php
if($_SERVER["REQUEST_METHOD"]=='POST'){
include './dbconnent.php';
// include "./session.php";
$name = $_POST['name'];
$phone = $_POST['phone'];
$CNIC = $_POST['cnic'];
$address = $_POST['address'];
$postalCode = $_POST['postalCode'];
$weight =$_POST['weight'];
$type = $_POST['type'];
$quantity = $_POST['quantity'];
$courier_person = $_POST['couriers_person'];
$randomNumber = mt_rand(10000, 99999);
  $trackingID = "TRK" . $randomNumber;
  $sql = "INSERT INTO `eagle_wings`.`tracking` (`tracking_number`) VALUES ('$trackingID');";
  $insertResult = mysqli_query($conn, $sql);

  $sql = "INSERT INTO `eagle_wings`.`shipper_details` (`name`, `phone_no`, `cinc`, `address`, `postal_code`, `courier_type`, `courier_weight`, `courier_quantity`, `status`, `time`, `tracking_number`, `courier_person`) VALUES ('$name', '$phone', '$CNIC', '$address', '$postalCode', '$type', '$weight', '$quantity', 'Pending', current_timestamp(), '$trackingID', '$courier_person');";


$result = mysqli_query($conn,$sql);

if($result){
    echo "Not Error";
}
else{
    echo "Error";
}
$Consignee_name = $_POST['Consignee_name'];
$Consignee_phone = $_POST['Consignee_phone'];
$Consignee_cnic = $_POST['Consignee_cnic'];
$Consignee_address = $_POST['Consignee_address'];
$Consignee_postalCode = $_POST['Consignee_postalCode'];

$sqli = "INSERT INTO `consignee_details` (`consignee_name`, `consignee_phone_no`, `consignee_cinc`, `consignee_address`, `consignee_postal_code`,`tracking_number`) VALUES ('$Consignee_name', '$Consignee_phone', '$Consignee_cnic', '$Consignee_address', '$Consignee_postalCode', '$trackingID');";

$result = mysqli_query($conn,$sqli);






}
?>
 <?php
      $weight = $_POST['weight'];
      $price = 0;
      $k;
      for ($k = 1; $k <= $weight; $k++) {
        $price = $price + 200;
      }
      ?>
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Courier Booked</h6>
                                <a href="couriersList.html">Show All</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tracking Id</th>
                                            <th scope="col">Courier Weight</th>
                                            <th scope="col">Courier Quntity</th>
                                            <th scope="col">Courier Type</th>
                                            <th scope="col">Sender Name</th>
                                            <th scope="col">Sender Address</th>
                                            <th scope="col">Sender Phone #</th>
                                            <th scope="col">Receiver Name</th>
                                            <th scope="col">Receiver Address</th>
                                            <th scope="col">Receiver Phone #</th>
                                            
                                            <th scope="col">Price</th>
                                            <!-- <th scope="col">Edit</th>
                                            <th scope="col">Delete</th> -->
                                            <th scope="col">Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
      
                                        <tr>
                                            <th scope="row"><?php echo $trackingID; ?></th>
                                            <td><?php echo $_POST['weight'] . "KG"; ?></td>
                                            <td><?php echo $_POST['quantity'] ?></td>
                                            <td><?php echo $_POST['type'] ?></td>
                                            <td><?php echo $_POST['name'] ?></td>
                                            <td><?php echo $_POST['address'] ?></td>
                                            <td><?php echo $_POST['phone'] ?></td>
                                            
                                            <td><?php echo  $_POST['Consignee_name'] ?></td>
                                            <td><?php echo  $_POST['Consignee_address'] ?></td>
                                            <td><?php echo  $_POST['Consignee_phone'] ?></td>
       
                                            <td><?php echo $price ?></td>
                                            <!-- <td><a class="btn btn-sm btn-outline-danger" href="">Edit</a></td>
                                            <td><a class="btn btn-sm btn-outline-danger" href="">Delete</a></td> -->
                                            <td><a class="btn btn-sm btn-outline-success" href="" onclick="">Print</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

            
            <!-- Footer Start -->
            <?php
            include "footer.php";
            ?>
            <!-- Footer End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
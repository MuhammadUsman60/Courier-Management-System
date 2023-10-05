<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Couriers List</title>
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
     <?php
    include './dbconnent.php';
    // include "./session.php";
    $sql = "SELECT
    consignee_details.consignee_sc,
    consignee_details.consignee_name,
    consignee_details.consignee_phone_no,
    consignee_details.consignee_cinc,
    consignee_details.consignee_address,
    consignee_details.consignee_postal_code,
    shipper_details.sc,
    shipper_details.name,
    shipper_details.phone_no,
    shipper_details.cinc,
    shipper_details.address,
    shipper_details.postal_code,
    shipper_details.courier_type,
    shipper_details.courier_weight,
    shipper_details.courier_quantity,
    shipper_details.status,
    shipper_details.courier_person,
    shipper_details.tracking_number
FROM
    consignee_details
INNER JOIN
    shipper_details
ON
    consignee_details.consignee_sc = shipper_details.sc;
";


    $result = mysqli_query($conn, $sql);
    
    ?>

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




            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Couriers List</h6>
                                <form class="d-none d-md-flex ms-4" action="couriersList.php" method="post">
                                    <input class="form-control bg-dark border-0" class="text" type="text" name="get_id" id="text" placeholder="Search">
                                    <input type="submit" class="btn btn-sm btn-outline-danger"  name="search_by_id"   value="Search"></input>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">sc</th>
                                            <th scope="col">Tracking Id</th>
                                            <th scope="col">Courier Status</th>
                                            <th scope="col">Courier Weight</th>
                                            <th scope="col">Courier Quntity</th>
                                            <th scope="col">Courier Type</th>
                                            <th scope="col">Courier Assigned</th>
                                            <th scope="col">Sender Name</th>
                                            <th scope="col">Sender Address</th>
                                            <th scope="col">Postal Code</th>
                                            <th scope="col">Sender Phone #</th>
                                            <th scope="col">Receiver Name</th>
                                            <th scope="col">Receiver Address</th>
                                            <th scope="col">Postal Code</th>
                                            <th scope="col">Receiver Phone #</th>
                                            <th scope="col">Change Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <tr>
                <?php
            if (isset($_POST['search_by_id'])) {
                $value = $_POST['get_id'];
                $sql = "SELECT * FROM shipper_details 
        JOIN consignee_details ON shipper_details.tracking_number = consignee_details.tracking_number
        WHERE shipper_details.tracking_number = '$value'";

                
                $result = mysqli_query($conn, $sql);
               
               

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                        <th scope="row"><?php echo $row['sc'] ?></th>
                        <td><?php echo $row['tracking_number']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        
                        <td><?php echo $row['courier_weight']; ?></td>
                        <td><?php echo $row['courier_quantity']; ?></td>
                        <td><?php echo $row['courier_type']; ?></td>
                        <td><?php echo $row['courier_person']; ?></td>
                        
                        <!-- sender -->
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['postal_code']; ?></td>
                        <td><?php echo $row['phone_no']; ?></td>
                        
                        

                        

                        <!-- Receiver -->
                        <td><?php echo $row['consignee_name']; ?></td>
                        <td><?php echo $row['consignee_address']; ?></td>
                        <td><?php  echo $row['consignee_postal_code']; ?></td>
                        <td><?php echo $row['consignee_phone_no']; ?></td>
                        <td>
                        <form action="status.php" method="POST" >
    <select name="status" onchange="submitForm(this)">
        <option value="Pending">Pending</option>
        <option value="Transporting">Transporting</option>
        <option value="Completed">Completed</option>
    </select>
    <input type="hidden" name="sc" value="<?php echo $row['sc'] ?>">
</form>

<script>
    function submitForm(selectElement) {
        selectElement.parentNode.submit();
    }
</script>


                        </select>
                            </form>
                        </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td>No record found</td>
                    </tr>
                    <?php
                }
            }
            ?>
            
                                        </tr>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        
                        <!-- courier -->
                        <th scope="row"><?php echo $row['sc'] ?></th>
                        <td><?php echo $row['tracking_number']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        
                        <td><?php echo $row['courier_weight']; ?></td>
                        <td><?php echo $row['courier_quantity']; ?></td>
                        <td><?php echo $row['courier_type']; ?></td>
                        <td><?php echo $row['courier_person']; ?></td>
                        
                        <!-- sender -->
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['postal_code']; ?></td>
                        <td><?php echo $row['phone_no']; ?></td>
                        
                        

                        

                        <!-- Receiver -->
                        <td><?php echo $row['consignee_name']; ?></td>
                        <td><?php echo $row['consignee_address']; ?></td>
                        <td><?php  echo $row['consignee_postal_code']; ?></td>
                        <td><?php echo $row['consignee_phone_no']; ?></td>
                        
                        
                        
                        
                        <td>


                        <form action="status.php" method="POST">
    <select name="status" onchange="submitForm(this)">
        <option value="Pending">Pending</option>
        <option value="Transporting">Transporting</option>
        <option value="Completed">Completed</option>
    </select>
    <input type="hidden" name="sc" value="<?php echo $row['sc']; ?>">
</form>

<script>
    function submitForm(selectElement) {
        selectElement.parentNode.submit();
    }
</script>


                        </select>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                
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


        </div>
        <?php 
    // ...

// if ($_SERVER["REQUEST_METHOD"] == 'POST') {
//     $sc = mysqli_real_escape_string($conn, $_POST['sc']);
//     $status = mysqli_real_escape_string($conn, $_POST['status']);

//     $updateSql = "UPDATE shipper_details SET status = '$status' WHERE sc = '$sc'";
//     $result = mysqli_query($conn, $updateSql);

//     if ($result) {
//         // Status updated successfully
//         echo "Status updated successfully.";
//     } else {
//         // Error occurred while updating status
//         echo "Error updating status: " . mysqli_error($conn);
//     }
// }

// ...
    ?>
        <!-- Content End -->


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
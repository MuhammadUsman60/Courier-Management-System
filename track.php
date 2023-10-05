<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Track Courier</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

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

            <!-- Couriers Data Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="row g-2">
                <div class="col-sm-6 col-xl-6">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-cube fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Courier</p>
                            <h6 class="mb-0"><?php 
                            include "./dbconnent.php";
                            $sql = "SELECT COUNT(*) AS status
                            FROM shipper_details;";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                            $count = $row['status'];
                            echo $count;
                            ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-6">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check-square fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Delivered Courier</p>
                            <h6 class="mb-0"><?php 
                           $sql = "SELECT COUNT(*) AS status
                           FROM shipper_details
                           WHERE status = 'Completed';";
                             $result = mysqli_query($conn,$sql);
                             $row2 = mysqli_fetch_assoc($result);
                             $count = $row2['status'];
                             echo $count;
                            ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-6">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-calendar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Pending Couriers</p>
                            <h6 class="mb-0"><?php 
                           $sql = "SELECT COUNT(*) AS status
                           FROM shipper_details
                           WHERE status = 'Pending';";
                             $result = mysqli_query($conn,$sql);
                             $row2 = mysqli_fetch_assoc($result);
                             $count = $row2['status'];
                             echo $count;
                            ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-6">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-truck fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Transporting Courier</p>
                            <h6 class="mb-0"><?php 
                           $sql = "SELECT COUNT(*) AS status
                           FROM shipper_details
                           WHERE status = 'Transporting';";
                             $result = mysqli_query($conn,$sql);
                             $row2 = mysqli_fetch_assoc($result);
                             $count = $row2['status'];
                             echo $count;
                            ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       
            <!-- Couriers Data End -->
            <br><br><br>
            <hr>
            
            <!-- Qoute for Admin -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-8 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4"></h6>
                        <div class="border rounded p-4 pb-0 mb-4">
                            <figure>
                                <blockquote class="blockquote">
                                    <p>Track your courier by entering the provided id!</p>
                                </blockquote>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Qoute for Admin end -->

            <br><br><br>
            <!-- track Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Track Courier</h6>
                                <a href="couriersList.html">Show All</a>
                            </div>
                            <div class="d-flex align-items-center py-3">
                                <!-- space -->
                            </div>
                            <div class="d-flex align-items-center py-3">
                                <div id="hero">
                                    
                                    <form class="form" action="#" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" class="text" type="text" name="get_id" id="text" placeholder="Enter Tracking id here">
                                            <label for="floatingInput">Enter Tracking Id here</label>
                                        </div>
                                        <button  class="btn btn-outline-primary w-100 m-0"  name="search_by_id" type="submit" value="Track">Track</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Courier Info</h6>
                                <a href="couriersList.html">Show All</a>
                            </div>
                            <!-- Table to be shown for pending, competed or transporting -->
                            <div class="container-fluid pt-4 px-4">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="bg-secondary rounded h-100 p-4">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Tracking id</th>
                                                            <th scope="col">Courier Weight (kg)</th>
                                                            <th scope="col">Courier Quantity</th>
                                                            <th scope="col">Courier Assigned</th>
                                                            <th scope="col">Courier Status</th>
                                                            <th scope="col">Sender Name</th>
                                                            <th scope="col">Receiver Name</th>
                                                            <th scope="col">Receiver Address</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                        <td><?php echo $row['tracking_number']; ?></td>
                        <td><?php echo $row['courier_weight']; ?></td>
                        <td><?php echo $row['courier_quantity']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['courier_person']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['consignee_name']; ?></td>
                        <td><?php echo $row['consignee_address']; ?></td>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- track End -->
    
            <!-- Footer Start -->
            <?php
            include "footer.php";
            ?>
            <!-- Footer End -->
            
        </div>
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
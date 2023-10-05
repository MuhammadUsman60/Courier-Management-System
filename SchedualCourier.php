<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Schedule Courier</title>
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


        <br><br><br>
        <hr>
            
            <!-- Couriers Data End -->
            
            
            <!-- Qoute for Admin -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-8 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4"></h6>
                        <div class="border rounded p-4 pb-0 mb-4">
                            <figure>
                                <blockquote class="blockquote">
                                    <p>Horaa! Another Courier!</p>
                                </blockquote>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Qoute for Admin end -->

            <br><br><br>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Shipper Detail</h6>

                            <form action="bookedPage.php" method="post">
                                <div class="mb-3">
                                    <label for="Sname" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="Sphone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="Scnic" class="form-label">CNIC</label>
                                    <input type="text" class="form-control" id="cnic" name="cnic">
                                </div>
                                <div class="mb-3">
                                    <label for="Saddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="mb-3">
                                    <label for="Spostalcode" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="postalCode" name="postalCode">
                                </div>
                            <!-- </form> -->

                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Consignee Detail</h6>

                            <!-- <form> -->
                                <div class="mb-3">
                                    <label for="Cname" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="Cname" name="Consignee_name">
                                </div>
                                <div class="mb-3">
                                    <label for="Cphone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="Cphone" name="Consignee_phone">
                                </div>
                                <div class="mb-3">
                                    <label for="Ccnic" class="form-label">CNIC</label>
                                    <input type="text" class="form-control" id="Ccnic" name="Consignee_cnic">
                                </div>
                                <div class="mb-3">
                                    <label for="Caddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="Caddress" name="Consignee_address">
                                </div>
                                <div class="mb-3">
                                    <label for="Cpostalcode" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="Cpostalcode" name="Consignee_postalCode">
                                </div>
                            <!-- </form> -->
                            
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Courier Detail</h6>
                            <!-- <form> -->
                                <div class="mb-3">
                                    <label for="Coname" class="form-label">type</label>
                                    <input type="text" class="form-control" name="type">
                                </div>
                                <div class="mb-3">
                                    <label for="Coweight" class="form-label">Weight (KG)</label>
                                    <input type="number" class="form-control" name="weight">
                                </div>
                                <div class="mb-3">
                                    <label for="Coquantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity">
                                </div>
                                <div class="mb-3">
                                    <label for="Cotypeselect">Assigning Courier Person</label>
                                    <?php
                        include "./dbconnent.php";
                        $sql = "SELECT * FROM `courier_persons`";
                        $result = mysqli_query($conn,$sql);
                        ?>
                                    <select class="form-select" id="Cotypeselect" name="couriers_person" onchange="submitForm(this)">
                                    <?php
                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                                        <option selected><?php echo $row['name']; ?></option>
                                        
                                        <?php
                            }
                            ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Coquantity" class="form-label"> <!--space--> </label>
                                    <button type="submit" class="btn btn-outline-primary w-100 m-2">Deliver</button>
                                </div>
                                

                            </form>
                            
                        </div>
                    </div>
                </div>
                <br><br><br>
            </div>
            <!-- Form End -->
    
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
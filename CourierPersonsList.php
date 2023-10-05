<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Courier Persons List</title>
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
 include "./dbconnent.php";
$i =1;

$sql = "SELECT * FROM `eagle_wings`.`courier_persons`";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{

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
                                <h6 class="mb-0">Courier Persons List</h6>
                                <form class="d-none d-md-flex ms-4"  action="CourierPersonsList.php" method="post">
                                    <input class="form-control bg-dark border-0" name="get_id" class="text" type="text" placeholder="Search">
                                    <input type="submit" class="btn btn-sm btn-outline-danger" name="search_by_id"></input>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone #</th>
                                            <th scope="col">CNIC</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Postal Code</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
    <?php
if (isset($_POST['search_by_id'])) {
                $value = $_POST['get_id'];
                $sql = "SELECT * FROM courier_persons WHERE name = '$value'";

                
                $result = mysqli_query($conn, $sql);
               
            //    if($result){
            //     echo "not error";
            //    }
            //    else{
            //     echo "error";
            //    }

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                    <td><?php echo  $row['name']; ?></td>
                    <td><?php  echo  $row['phone']; ?></td>
                    <td><?php echo $row['cinc'] ?></td>
                    <td><?php echo  $row['address']; ?></td>
                    <td><?php echo  $row['postalCode']; ?></td>
                    <td><a class="btn btn-sm btn-outline-danger" href="">Edit</a></td>
                    <form action="delectCPerson.php" method="post">
                    <td><a class="btn btn-sm btn-outline-danger" onchange="submitForm(this)" href="delectCPerson.php">Delete</a></td>
                    <input type="hidden" name="sno" value="<?php echo $row['sno'] ?>">
                    </form>
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
                                    <?php
           while($row = mysqli_fetch_assoc($result))
    {

?>
                <tr>
                    <th scope="row"><?php echo $row['sno']; ?></th>
                    <td><?php echo  $row['name']; ?></td>
                    <td><?php  echo  $row['phone']; ?></td>
                    <td><?php echo $row['cinc'] ?></td>
                    <td><?php echo  $row['address']; ?></td>
                    <td><?php echo  $row['postalCode']; ?></td>
                    <form action="updateCourierPerson.php" method="post" onchange="submitForm(this)">
                    <input type="hidden" name="sno" value="<?php echo $row['sno']; ?>">
                    <input type="hidden" name="new_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="new_phone" value="<?php echo $row['phone']; ?>">
                    <input type="hidden" name="address" value="<?php echo $row['address']; ?>">
                    <td><button class="btn btn-sm btn-outline-danger">Edit</a></button></td>
                </form>
                    
                    <form action="delectCPerson.php" method="post" onchange="submitForm(this)">
    <!-- Move the button inside a table cell -->
    <td>
        <input type="hidden" name="sno" value="<?php echo $row['sno']; ?>">
        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
    </td>
</form>

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
            <!-- Table End -->



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
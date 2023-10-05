<?php
if($_POST['email']){
    include "dbconnent.php";
    $username = $_POST['email'];
$password = $_POST['password'];
$sql = "Select * from user where username = '$username' AND password = '$password'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num == 1){
    echo "YOU have successfully logged in";
    // $_SESSION['loggedin']=true;
    $_SESSION['email'] = $username && $_SESSION['password'] = $password;
    header("location: home.php");
    exit();

}
else{
    echo "Invalid credentials";
    exit();
}
}
?>



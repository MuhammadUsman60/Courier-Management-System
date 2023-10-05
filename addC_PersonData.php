<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include "./dbconnent.php";
  $showAlert = false;
  $showError = false;
    $username = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm_login_password'];
    $name = $_POST['Sname'];
    $phone = $_POST['Sphone'];
    $cnic = $_POST['Scnic'];
    $address = $_POST['Saddress'];
    $showError = true;
    $postalCode = $_POST['Spostalcode'];
    $exists = false;
  if(($password == $cpassword) && $exists == false){
    $sql = "INSERT INTO `user` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp());
    ";
    
    $result  = mysqli_query($conn,$sql);

    if($result){
        $showAlert = true;
        
    }
}else{
    $showError = "Passwords does not match";
   
}

$sql = "INSERT INTO `courier_persons` (`sno`, `name`, `phone`, `address`, `postalCode`, `cinc`, `username`) VALUES (NULL, '$name', '$phone', '$address', '$postalCode', '$cnic', '$username');";
$stmt = mysqli_query($conn, $sql);
// if($stmt){
//     echo "not error";
    
// }
// else{
//     echo "error";
// }
  

}
if($stmt){
  header("location: CourierPersonsList.php");
}


?>
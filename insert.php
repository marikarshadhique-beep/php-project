<?php  
include "db.php";

$username = $_POST['username'];
$fullname = $_POST['fullname'];
$nic = $_POST['nic'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$date = $_POST['registration_date'];
$time = $_POST['registration_time'];

$sql = "INSERT INTO student(username,fullname,nic,phone,email,address,registration_date,registration_time) 
VALUES (?,?,?,?,?,?,?,?)";

$stvt = mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param(
    $stvt,
    "ssssssss",
    $username,
    $fullname,
    $nic,
    $phone,
    $email,
    $address,
    $date,
    $time
);

if(mysqli_stmt_execute($stvt)) {

   header("Location: show.php");
   exit;

}else {

    echo "Insert Failed: " . mysqli_stmt_error($stvt);

}

mysqli_stmt_close($stvt);
mysqli_close($conn);


?>
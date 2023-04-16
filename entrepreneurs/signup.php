<?php 
require("./layout/db.php");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$cat = $_POST["cat"];
$comname = $_POST["comname"];
$address = $_POST["address"];

$sql = "INSERT INTO en(name,email,password,mobile,cat,comname,address) VALUES('$name','$email','$password','$mobile','$cat','$comname','$address');";


try {
    $conn->query($sql);
    header("Location:/entrepreneurs?msg=Account Created Successfully!");
    die();
} catch (Exception $e) {
    header("Location:/entrepreneurs?err=Something Went Wrong!");
    die();
}

?>
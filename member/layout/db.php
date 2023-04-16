<?php
session_start();
if(isset($_SESSION["memberid"])){

}else{
    header("Location:/member?err=Something Went Wrong!");
    die();
}
$servername = "localhost";
$username = "root";
$password = "trysomething";
$db_name = "rwad";
$conn = new mysqli($servername, $username, $password,$db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
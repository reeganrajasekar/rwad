<?php
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$data = test_input($_POST['data']);
session_start();
$enid = $_SESSION["enid"];
$enname = $_SESSION["enname"];

$sql = "INSERT INTO chat (data , enid , mid , name)
VALUES ('$data' ,'$enid','no' , '$enname')";

if ($conn->query($sql) === TRUE) {
    header("Location: /entrepreneurs/chat.php?page=1&msg=Message Send Successfully !");
    die();
}else {
    header("Location: /entrepreneurs/chat.php?page=1&err=Something went Wrong!");
    die();
}


?>
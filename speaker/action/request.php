<?php
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$title = test_input($_POST['title']);
$data = test_input($_POST['data']);
$cat = test_input($_POST['cat']);
session_start();
$sid = $_SESSION["speakerid"];
$sql = "INSERT INTO speech (title , data , cat,sid,status,comment)
VALUES ('$title' ,'$data','$cat','$sid','Applied','Processing')";

if ($conn->query($sql) === TRUE) {
    header("Location: /speaker/apply.php?page=1&msg=Applied Successfully !");
    die();
}else {
    header("Location: /speaker/apply.php?page=1&err=Something went Wrong!");
    die();
}


?>
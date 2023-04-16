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
$memberid = $_SESSION["memberid"];
$membername = $_SESSION["membername"];
$enid = $_POST['enid'];

$sql = "INSERT INTO chat (data , enid , mid , name)
VALUES ('$data' ,'$enid','$memberid' , '$membername')";

if ($conn->query($sql) === TRUE) {
    header("Location: /member/chat_en.php?id=".$_POST['enid']);
    die();
}else {
    header("Location: /entrepreneurs/chat.php?page=1&err=Something went Wrong!");
    die();
}


?>
<?php
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_start();
$old = test_input($_POST['old']);
$new = test_input($_POST['new']);
$memberid = $_SESSION["memberid"];

$result = $conn->query("SELECT password FROM members WHERE id='$memberid'");
while ($row = $result->fetch_assoc()) {
    if($row["password"]==$old){
        $conn->query("UPDATE members SET password='$new' WHERE id='$memberid'");
        header("Location:/member/home.php?msg=Password Changed Successfully!");
        die();
    }
    else{
        header("Location:/member/members.php?err=Old Password is Wrong!");
        die();
    }
}
?>
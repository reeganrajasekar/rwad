<?php
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nid = test_input($_POST['nid']);
$name = test_input($_POST['name']);
$mobile = test_input($_POST['mobile']);

$sql = "INSERT INTO members (nid , name , password , mobile)
VALUES ('$nid' ,'$name','$mobile','$mobile')";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/members.php?page=1&msg=Member Added Successfully !");
    die();
}else {
    header("Location: /admin/members.php?page=1&err=Something went Wrong!");
    die();
}

?>
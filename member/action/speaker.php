<?php
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$status = test_input($_POST['status']);
$comment = test_input($_POST['comment']);
$id = test_input($_POST['id']);

$sql = "UPDATE speech SET status='$status' , comment='$comment' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /member/speaker.php?page=1&msg=Updated Successfully !");
    die();
}else {
    header("Location: /member/speaker.php?page=1&err=Something went Wrong!");
    die();
}


?>
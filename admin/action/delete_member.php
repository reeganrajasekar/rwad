<?php
require("../layout/db.php");

$id= $_GET['id'];

$sql = "DELETE FROM members WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/members.php?page=1&msg=Member Deleted Successfully !");
    die();
} else {
    header("Location: /admin/members.php?page=1&err=Something went Wrong!");
    die();
}


?>
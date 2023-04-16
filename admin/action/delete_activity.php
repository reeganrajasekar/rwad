<?php
require("../layout/db.php");

$id= $_GET['id'];

$sql = "DELETE FROM activities WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/activities.php?page=1&msg=Activity Deleted Successfully !");
    die();
} else {
    header("Location: /admin/activities.php?page=1&err=Something went Wrong!");
    die();
}


?>
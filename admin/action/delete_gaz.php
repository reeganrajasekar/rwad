<?php
require("../layout/db.php");

$id= $_GET['id'];

$sql = "DELETE FROM gaz WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/gaz.php?page=1&msg=Gazette Deleted Successfully !");
    die();
} else {
    header("Location: /admin/gaz.php?page=1&err=Something went Wrong!");
    die();
}


?>
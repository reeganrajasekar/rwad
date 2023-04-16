<?php
require("../layout/db.php");

$id= $_GET['id'];

$sql = "DELETE FROM store WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/merch.php?page=1&msg=Product Deleted Successfully !");
    die();
} else {
    header("Location: /admin/merch.php?page=1&err=Something went Wrong!");
    die();
}


?>
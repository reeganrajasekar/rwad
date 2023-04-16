<?php
require("../layout/db.php");

$id= $_GET['id'];

$sql = "DELETE FROM event WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /member/events.php?page=1&msg=Event Deleted Successfully !");
    die();
} else {
    header("Location: /member/events.php?page=1&err=Something went Wrong!");
    die();
}


?>
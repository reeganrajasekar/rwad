<?php
require("./layout/db.php");

$nid = $_POST["nid"];
$password = $_POST["password"];

$sql = "SELECT * FROM members WHERE nid='$nid' AND password='$password'";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        session_start();
        $_SESSION["memberid"]=$row["id"];
        $_SESSION["membername"]=$row["name"];
        header("Location:/member/home.php");
        die();
    }
}else{
    header("Location:/member?err=Id or Password is Wrong!");
    die();
}
?>
<?php
require("./layout/db.php");

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM en WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        session_start();
        if ($row["cat"]=="Entrepreneur") {
            $_SESSION["enid"]=$row["id"];
            $_SESSION["enname"]=$row["name"];
            header("Location:/entrepreneurs/home.php");
            die();
        } else {
            $_SESSION["speakerid"]=$row["id"];
            $_SESSION["speakername"]=$row["name"];
            header("Location:/speaker/home.php");
            die();
        }
        
    }
}else{
    header("Location:/entrepreneurs?err=Id or Password is Wrong!");
    die();
}
?>
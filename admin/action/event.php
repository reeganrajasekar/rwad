<?php
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$title = test_input($_POST['title']);
$data = test_input($_POST['data']);
$date = test_input($_POST['date']);
$link = test_input($_POST['link']);

$file_name = strtotime("now").$_FILES["img"]["name"];
$target_dir = "../../static/uploads/";
$target_file = $target_dir . basename($file_name);

$sql = "INSERT INTO event (title , data , img , date , link)
VALUES ('$title' ,'$data','$file_name','$date' , '$link')";

if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){
    if ($conn->query($sql) === TRUE) {
        header("Location: /admin/events.php?page=1&msg=Event Added Successfully !");
        die();
    }else {
        header("Location: /admin/events.php?page=1&err=Something went Wrong!");
        die();
    }
}else {
    header("Location: /admin/events.php?page=1&err=Something went Wrong!");
    die();
}


?>
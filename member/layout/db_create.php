<?php 
require("./db.php");

// 
$sql = "CREATE TABLE IF NOT EXISTS members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nid VARCHAR(500) NOT NULL,
    name VARCHAR(500) NOT NULL,
    password VARCHAR(500) NOT NULL,
    mobile VARCHAR(500) NOT NULL
);";

if ($conn->query($sql) === TRUE) {
    echo "Table Members created successfully<br>";
} else {
    echo "Error creating table: Members";
}

$sql = "CREATE TABLE IF NOT EXISTS activities (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(500) NOT NULL,
    data varchar(500) NOT NULL,
    img varchar(500) not null,
    date varchar(30)
);";

if ($conn->query($sql) === TRUE) {
    echo "Table Activity created successfully<br>";
} else {
    echo "Error creating table: Activity";
}

$sql = "CREATE TABLE IF NOT EXISTS store (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(500) NOT NULL,
    data VARCHAR(500) NOT NULL,
    rate VARCHAR(500) NOT NULL,
    img VARCHAR(500)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table store created successfully<br>";
} else {
    echo "Error creating table: store";
}

$sql = "CREATE TABLE event (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    data VARCHAR(500) NOT NULL,
    date VARCHAR(50) NOT NULL,
    img VARCHAR(500) NOT NULL,
    link VARCHAR(500) NOT NULL
  );";

if ($conn->query($sql) === TRUE) {
    echo "Table Events created successfully<br>";
} else {
    echo "Error creating table: Events";
}

$conn->close();


?>
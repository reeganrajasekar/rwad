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

$sql = "CREATE TABLE IF NOT EXISTS event (
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


$sql = "CREATE TABLE IF NOT EXISTS en (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(500) NOT NULL,
    password VARCHAR(500) NOT NULL,
    name VARCHAR(500) NOT NULL,
    comname VARCHAR(500) NOT NULL,
    cat VARCHAR(500) NOT NULL,
    mobile VARCHAR(500) NOT NULL,
    address VARCHAR(500) NOT NULL
);";

if ($conn->query($sql) === TRUE) {
    echo "Table En created successfully<br>";
} else {
    echo "Error creating table: En";
}

$sql = "CREATE TABLE IF NOT EXISTS speech (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(500) NOT NULL,
    data VARCHAR(500) NOT NULL,
    cat VARCHAR(500) NOT NULL,
    sid VARCHAR(500) NOT NULL,
    status VARCHAR(1000) NOT NULL,
    comment VARCHAR(500) NOT NULL
);";

if ($conn->query($sql) === TRUE) {
    echo "Table Speech created successfully<br>";
} else {
    echo "Error creating table: Speech";
}

$sql = "CREATE TABLE IF NOT EXISTS chat (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    data VARCHAR(500) NOT NULL,
    enid VARCHAR(500) NOT NULL,
    mid VARCHAR(500) NOT NULL,
    name VARCHAR(500) NOT NULL,
    date timestamp default current_timestamp not null
);";

if ($conn->query($sql) === TRUE) {
    echo "Table Chat created successfully<br>";
} else {
    echo "Error creating table: Chat";
}

$conn->close();


?>
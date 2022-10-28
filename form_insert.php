<?php
require "connect_db.php";

//Insert table
$sql = "INSERT INTO products ( name, description, price, photo, created, modified)
        VALUES ( '$name', '$desc','$price', '$image', SYSDATE() , SYSDATE())";

if ($conn->query($sql) === TRUE) {
    echo "<br>";
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('location: insert_tabel.php');

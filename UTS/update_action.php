<?php
require "connect_db.php";

$id = $_GET['id'];
$sql1 = "UPDATE products SET name='$name', description='$desc', price='$price', photo='$image', modified = sysdate() WHERE id='$id'";

if (mysqli_query($conn, $sql1)) {
    echo "<br>";
    // echo "New record created successfully";
    header('location: table_db.php');
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}


mysqli_close($conn);

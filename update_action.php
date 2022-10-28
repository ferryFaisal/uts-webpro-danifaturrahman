<?php
require "connect_db.php";

$id = $_POST['id'];
$sql1 = "UPDATE user SET name='$name', description='$desc', price='$price', photo='$image', date_modified = sysdate() WHERE id='$id'";

if (mysqli_query($conn, $sql1)) {
    echo "<br>";
    // echo "New record created successfully";
    header('location: read_data.php');
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

mysqli_close($conn);

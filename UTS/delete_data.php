<?php
require 'connect_db.php';

$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('location: table_db.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);

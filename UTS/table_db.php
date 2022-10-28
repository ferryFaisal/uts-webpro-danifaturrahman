<?php
require "connect_db.php";

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) { ?>
    <!--  output data of each row  -->
    <!DOCTYPE html>
    <html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="fs-2 fw-bold text-center">
                        <p>TABLE OF PRODUCTS</p>
                    </div>
                    <a class="btn btn-primary ms-3 mb-3" href="form.php" role="button">Add Data</a>
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Products</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Photo</th>
                            <th>Date Created</th>
                            <th>Date Modified</th>
                            <th>Action</th>
                        </tr>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row["id"] ?></td>
                                <td><?= $row["name"] ?></td>
                                <td><?= $row["description"] ?></td>
                                <td><?= $row["price"] ?></td>
                                <td><img src="image/<?= $row['photo'] ?>" alt="" width="120px" height="100px"></td>
                                <td><?= $row["created"] ?></td>
                                <td><?= $row["modified"] ?></td>

                                <td><a href='update_data.php?id=<?= $row['id'] ?>'><i class="uil uil-edit-alt"></i></a> |
                                    <a onclick="return confirm ('Want to Delete ?') " href='delete_data.php?id=<?= $row['id'] ?>'><i class="uil uil-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
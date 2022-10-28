<?php

// define variables and set to empty values
$nameErr = $descErr = $priceErr = $imageErr = "";
$name = $desc = $price = $image = "";
$valid_name = $valid_desc = $valid_price = $valid_image = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //product section
    if (empty($_POST["name"])) {
        $nameErr = "Name of Product is Required";
        $valid_name = false;
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $valid_name = false;
        } else {
            $name = test_input($_POST["name"]);
            $valid_name = true;
        }
    }

    // descript section
    if (empty($_POST["desc"])) {
        $descErr = "Description of Product is required";
        $valid_desc = false;
    } else {
        $desc = test_input($_POST["desc"]);
        $valid_desc = true;
    }

    //price section
    if (empty($_POST["price"])) {
        $priceErr = "Description of Product is required";
        $valid_price = false;
    } else {
        $price = test_input($_POST["price"]);
        $valid_price = true;
    }

    $image = $_FILES['file']['name'];
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $image)) {
            // Insert record
            $valid_image = true;
        }
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>FORM PRODUCTS</title>

    <style>
        .error {
            color: #FF0000;
        }

        .bgsa {
            background-color: #FF0000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row col-lg-5">
            <div class="my-5 fs-2 fw-bold ms-3 mb-4">
                <p>INPUT NEW PRODUCTS</p>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-3 ms-5">
                    <label class="form-label">Product</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                    <span class="error">* <?php echo $nameErr; ?></span>
                </div>

                <div class="mb-3 ms-5">
                    <label class="form-label">Description</label>
                    <textarea name="desc" id="" cols="30" rows="10" class="form-control" value="<?php echo $desc; ?>"></textarea>
                    <span class="error">* <?php echo $descErr; ?></span>
                </div>

                <div class="mb-3 ms-5">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                    <span class="error">* <?php echo $priceErr; ?></span>
                </div>

                <div class="mb-3 ms-5">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="file">
                    <span class="error">* <?php echo $imageErr; ?></span>
                </div>

                <input type="submit" name="submit" value="Submit" class="btn btn-success ms-5 mb-5">
            </form>
        </div>
    </div>

    <?php
    if ($valid_name && $valid_desc && $valid_price == true) {
        echo $name;
        echo "<br>";
        echo $desc;
        echo "<br>";
        echo $price;
        echo "<br>";
        echo $image;
        include 'update_action.php';
    }
    ?>
</body>

</html>
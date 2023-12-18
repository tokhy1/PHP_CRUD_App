<?php
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Update Data</title>
</head>

<body>

    <!-- UPDATE DATA -->
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require "./connection.php";

        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        try {
            $query = "UPDATE `products` SET `name`='$name',`description`='$description',`price`='$price' WHERE id=$id";
            $conn->query($query);
        } catch (Exception $e) {
            die("<h5 class='text-center text-danger'>Cann't Update data to Database! {$e->getMessage()} </h5>");
        }

        header("Location:./index.php");
    }

    ?>

    <div class="container">
        <h1 class="text-center mb-2 mt-5">Updating Product</h1>
        <form method="post" class="form">
            <form>
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Product Description</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="mb-3">
                    <label class="form-label">Product Price</label>
                    <input type="text" class="form-control" name="price">
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
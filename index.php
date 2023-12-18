<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>



    <!-- SELECT DATA-->
    <div class="container">
        <h1 class="text-center mt-5">CRUD APP</h1>
        <table class="table text-center mt-5">

            <thead>
                <tr>
                    <th>Name</th> 
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
                require("./connection.php");

                try {
                    $query = "SELECT * FROM `products`";
                    $result = $conn->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                } catch (Exception $e) {
                    die("<h5 class='text-center text-danger'>Unexpected Error occured! {$e->getMessage()} </h5>");
                }


                foreach ($rows as $row) {
                    $id = $row["id"];
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                        if ($key != "id") {
                            echo "<td>";
                            echo $value;
                            echo "</td>";
                        }
                    }
                    
                    echo "<td>" . "<a class='btn btn-success' href='./update.php?id=$id'>Update</a>" . 
                    " <a class='btn btn-danger' href='./delete.php?id=$id'>Delete</a>" . "</td>";
                    
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="./insert.php" class="btn btn-primary mt-2">Add New Product</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
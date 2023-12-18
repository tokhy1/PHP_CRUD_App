<?php

// DELETE DATA
$id = $_GET["id"];
require "./connection.php";

try {
    $query = "DELETE FROM `products` WHERE id=$id";
    $conn->query($query);
} catch (Exception $e) {
    die("<h5 class='text-center text-danger'>Cann't Delete Data! {$e->getMessage()} </h5>");
}

header("location:./index.php");

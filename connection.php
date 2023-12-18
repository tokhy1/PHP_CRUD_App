<?php
try {
    $conn = new mysqli("localhost", "root", "", "crud_app");
} catch (Exception $e) {
    die ("<h5 class='text-center text-danger'>Cann't connect to Database! {$e->getMessage()} </h5>");
}


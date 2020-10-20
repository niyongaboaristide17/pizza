<?php
    $conn = mysqli_connect('localhost', 'root', 'PASS', 'ninja_pizza');
    if (!$conn) {
        # code...
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>
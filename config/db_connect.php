<?php
    $conn = mysqli_connect('localhost', 'root', 'celine2009', 'ninja_pizza');
    if (!$conn) {
        # code...
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>
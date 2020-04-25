<?php
    $host     = "localhost";
    $username = "root";
    $password = "";
    $database = "cucimobil";
    $koneksi=mysqli_connect("localhost", "root","","cucimobil");

    if (! $koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "db_perpustakaan";

    $conn = mysqli_connect($servername, $username, $password, $databasename);
    if (!$conn) {
        die ("Koneksi tidak berhasil");
    }
?>
<?php
    //Koneksi ke database mysql
    include "../config/conn.php";

    //Mendapatkan variabel post
    $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $level = isset($_POST['level']) ? $_POST['level'] : "";
   
    $sql = "INSERT INTO `multiuser` (`nama`, `username`, `password`, `level`) 
    VALUES ('".$nama."', '".$username."', '".$password."', '".$level."');";
    // echo $sql;
    //Running Query
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "Simpan data multiuser berhasil";
    }else {
        $msg = "Simpan data multiuser gagal";
    }

    // echo $msg;
    // echo 'test';
    $response = array (
        'status'=>'OK',
        'msg'=>$msg
    );

    echo json_encode($response);
?>
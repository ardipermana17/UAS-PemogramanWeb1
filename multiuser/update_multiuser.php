<?php
    //include koneksi ke database
    include "../config/conn.php";

    // echo "update pengunjung";

    //Menangkap variabel parameter get
    $id = $_GET['id'];

    //Bagian ini yang akan/ingin diubah
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql = "UPDATE `multiuser` SET `nama` = '".$nama."', `username` = '".$username."', `password` = '".$password."', `level` = '".$level."' 
    WHERE `multiuser`.`id` = ".$id.";";
    // echo $sql;

    //Running Query
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "Update data multiuser berhasil";
    }else {
        $msg = "Update data multiuser gagal";
    }

    $response = array (
        'status'=>'OK',
        'msg'=>$msg
    );

    echo json_encode($response);
?>
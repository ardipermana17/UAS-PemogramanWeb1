<?php
    include "../config/conn.php";

    $myArray = array();
     if (isset($_GET['id_buku'])) {
        $id=$_GET['id_buku'];

        $sql = "DELETE FROM `data_buku` WHERE `data_buku`.`id_buku` = $id";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $msg = "Hapus data buku berhasil";
        }else {
            $msg = "Hapus data buku gagal";
        }
        $response = array (
            'status'=>'OK',
            'msg'=>$msg
        );

        echo json_encode($response);
     }
?>
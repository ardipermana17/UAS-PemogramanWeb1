<?php
    include "../config/conn.php";

    $myArray = array();
     if (isset($_GET['id_transaksi'])) {
        $id=$_GET['id_transaksi'];

        $sql = "DELETE FROM `data_transaksi` WHERE `data_transaksi`.`id_transaksi` = $id";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $msg = "Hapus data transaksi berhasil";
        }else {
            $msg = "Hapus data transaksi gagal";
        }
        $response = array (
            'status'=>'OK',
            'msg'=>$msg
        );

        echo json_encode($response);
     }
?>
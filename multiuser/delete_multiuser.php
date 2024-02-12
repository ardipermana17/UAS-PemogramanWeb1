<?php
    include "../config/conn.php";

    $myArray = array();
     if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql = "DELETE FROM `multiuser` WHERE `multiuser`.`id` = $id";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $msg = "Hapus data multiuser berhasil";
        }else {
            $msg = "Hapus data multiuser gagal";
        }
        $response = array (
            'status'=>'OK',
            'msg'=>$msg
        );

        echo json_encode($response);
     }
?>
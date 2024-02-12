<?php
    include "../config/conn.php";

    $myArray = array();
     if (isset($_GET['id_pengunjung'])) {
        $id=$_GET['id_pengunjung'];

        $sql = "DELETE FROM `data_pengunjung` WHERE `data_pengunjung`.`id_pengunjung` = $id";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $msg = "Hapus data pengunjung berhasil";
        }else {
            $msg = "Hapus data pengunjung gagal";
        }
        $response = array (
            'status'=>'OK',
            'msg'=>$msg
        );

        echo json_encode($response);
     }
?>
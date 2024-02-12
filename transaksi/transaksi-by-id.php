<?php
     require_once('../config/conn.php');

     $myArray = array();
     if (isset($_GET['id_transaksi'])) {
        $id=$_GET['id_transaksi'];

        if ($result = mysqli_query($conn, "SELECT * FROM data_transaksi WHERE id_transaksi=$id")) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                $myArray[] = $row;
            }
            mysqli_close($conn);
            echo json_encode($myArray);
        }
     }
?>
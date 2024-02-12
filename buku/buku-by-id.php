<?php
     require_once('../config/conn.php');

     $myArray = array();
     if (isset($_GET['id_buku'])) {
        $id=$_GET['id_buku'];

        if ($result = mysqli_query($conn, "SELECT * FROM data_buku WHERE id_buku=$id")) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                $myArray[] = $row;
            }
            mysqli_close($conn);
            echo json_encode($myArray);
        }
     }
?>
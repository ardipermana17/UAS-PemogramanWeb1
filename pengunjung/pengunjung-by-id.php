<?php
     require_once('../config/conn.php');

     $myArray = array();
     if (isset($_GET['id_pengunjung'])) {
        $id=$_GET['id_pengunjung'];

        if ($result = mysqli_query($conn, "SELECT * FROM data_pengunjung WHERE id_pengunjung=$id")) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                $myArray[] = $row;
            }
            mysqli_close($conn);
            echo json_encode($myArray);
        }
     }
?>
<?php
    //Koneksi ke database mysql
    include "../config/conn.php";

    //Membuat query/sql untuk mengambil seluruh data multiuser
    $sql = "SELECT * FROM multiuser";
    $query = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($query)) {
        // echo $data ["nama"]." ";

        $item[] = array (
            'nama' =>$data["nama"],
            'username' =>$data["username"],
            'password' => $data["password"],
            'level' => $data["level"]
        );
    }

    $response = array (
        'status'=>'OK',
        'data'=>$item
    );

    echo json_encode($response);
?>
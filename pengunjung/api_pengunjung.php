<?php
    //Koneksi ke database mysql
    include "../config/conn.php";

    //Membuat query/sql untuk mengambil seluruh data pengunjung
    $sql = "SELECT * FROM data_pengunjung";
    $query = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($query)) {
        // echo $data ["nim"]." ";

        $item[] = array (
            'nim'=>$data["nim"],
            'nama' =>$data["nama"],
            'kelas' =>$data["kelas"],
            'no_handphone' => $data["no_handphone"],
            'alamat' => $data["alamat"],
            'id' => $data["id_pengunjung"]
        );
    }

    $response = array (
        'status'=>'OK',
        'data'=>$item
    );

    echo json_encode($response);
?>
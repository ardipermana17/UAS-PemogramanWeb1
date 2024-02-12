<?php
    //Koneksi ke database mysql
    include "../config/conn.php";

    //Membuat query/sql untuk mengambil seluruh data buku
    $sql = "SELECT * FROM data_transaksi";
    $query = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($query)) {
        // echo $data ["id"]." ";

        $item[] = array (
            'id_buku'=>$data["id_buku"],
            'id_pengunjung' =>$data["id_pengunjung"],
            'tanggal' =>$data["tanggal"],
            'keterangan' => $data["keterangan"],
            'id' => $data["id_transaksi"]
        );
    }

    $response = array (
        'status'=>'OK',
        'data'=>$item
    );

    echo json_encode($response);
?>
<?php
    //Koneksi ke database mysql
    include "../config/conn.php";

    //Membuat query/sql untuk mengambil seluruh data buku
    $sql = "SELECT * FROM data_buku";
    $query = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($query)) {
        // echo $data ["judul"]." ";

        $item[] = array (
            'judul'=>$data["judul"],
            'pengarang' =>$data["pengarang"],
            'penerbit' =>$data["penerbit"],
            'tahun_terbit' =>$data["tahun_terbit"],
            'isbn' => $data["isbn"],
            'kategori' => $data["kategori"],
            'jumlah_buku' => $data["jumlah_buku"],
            'id' => $data["id_buku"]
        );
    }

    $response = array (
        'status'=>'OK',
        'data'=>$item
    );

    echo json_encode($response);
?>
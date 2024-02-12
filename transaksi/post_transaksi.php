<?php
    //Koneksi ke database mysql
    include "../config/conn.php";

    //Mendapatkan variabel post
    $id_buku = isset($_POST["id_buku"]) ? $_POST["id_buku"] : "";
    $id_pengunjung = isset($_POST['id_pengunjung']) ? $_POST['id_pengunjung'] : "";
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : "";
    $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : "";
   
    $sql = "INSERT INTO `data_transaksi` (`id_buku`, `id_pengunjung`, `tanggal`, `keterangan`) 
    VALUES ('".$id_buku."', '".$id_pengunjung."', '".$tanggal."', '".$keterangan."');";
    // echo $sql;
    //Running Query
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "Simpan data transaksi berhasil";
    }else {
        $msg = "Simpan data transaksi gagal";
    }

    // echo $msg;
    // echo 'test';
    $response = array (
        'status'=>'OK',
        'msg'=>$msg
    );

    echo json_encode($response);
?>
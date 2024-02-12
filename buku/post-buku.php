<?php
    //Koneksi ke database mysql
    include "../config/conn.php";

    //Mendapatkan variabel post
    $judul = isset($_POST["judul"]) ? $_POST["judul"] : "";
    $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : "";
    $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : "";
    $tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : "";
    $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : "";
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : "";
    $jumlah_buku = isset($_POST['jumlah_buku']) ? $_POST['jumlah_buku'] : "";
   
    $sql = "INSERT INTO `data_buku` (`judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `kategori`, `jumlah_buku`) 
    VALUES ('".$judul."', '".$pengarang."', '".$penerbit."', '".$tahun_terbit."', '".$isbn."', '".$kategori."', '".$jumlah_buku."');";
    // echo $sql;
    //Running Query
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "Simpan data buku berhasil";
    }else {
        $msg = "Simpan data buku gagal";
    }

    // echo $msg;
    // echo 'test';
    $response = array (
        'status'=>'OK',
        'msg'=>$msg
    );

    echo json_encode($response);
?>
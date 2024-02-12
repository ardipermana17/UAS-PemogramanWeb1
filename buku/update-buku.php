<?php
    //include koneksi ke database
    include "../config/conn.php";

    // echo "update buku";

    //Menangkap variabel parameter get
    $id = $_GET['id'];

    //Bagian ini yang akan/ingin diubah
    $judul = isset($_POST["judul"]) ? $_POST["judul"] : "";
    $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : "";
    $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : "";
    $tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : "";
    $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : "";
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : "";
    $jumlah_buku = isset($_POST['jumlah_buku']) ? $_POST['jumlah_buku'] : "";

    $sql = "UPDATE `data_buku` SET `judul` = '".$judul."', `pengarang` = '".$pengarang."', `penerbit` = '".$penerbit."', `tahun_terbit` = '".$tahun_terbit."', `isbn` = '".$isbn."', `kategori` = '".$kategori."', `jumlah_buku` = '".$jumlah_buku."' 
    WHERE `data_buku`.`id_buku` = ".$id.";";
    // echo $sql;

    //Running Query
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "Update data buku berhasil";
    }else {
        $msg = "Update data buku gagal";
    }

    $response = array (
        'status'=>'OK',
        'msg'=>$msg
    );

    echo json_encode($response);
?>
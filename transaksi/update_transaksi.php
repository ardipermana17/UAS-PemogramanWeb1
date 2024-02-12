<?php
    //include koneksi ke database
    include "../config/conn.php";

    // echo "update pengunjung";

    //Menangkap variabel parameter get
    $id = $_GET['id'];

    //Bagian ini yang akan/ingin diubah
    $id_buku = $_POST['id_buku'];
    $id_pengunjung = $_POST['id_pengunjung'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE `data_transaksi` SET `id_buku` = '".$id_buku."', `id_pengunjung` = '".$id_pengunjung."', `tanggal` = '".$tanggal."', `keterangan` = '".$keterangan."' 
    WHERE `data_transaksi`.`id_transaksi` = ".$id.";";
    // echo $sql;

    //Running Query
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "Update data transaksi berhasil";
    }else {
        $msg = "Update data transaksi gagal";
    }

    $response = array (
        'status'=>'OK',
        'msg'=>$msg
    );

    echo json_encode($response);
?>
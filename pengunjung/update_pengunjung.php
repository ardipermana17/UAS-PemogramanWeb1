<?php
    //include koneksi ke database
    include "../config/conn.php";

    // echo "update pengunjung";

    //Menangkap variabel parameter get
    $id = $_GET['id'];

    //Bagian ini yang akan/ingin diubah
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $no_handphone = $_POST['no_handphone'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE `data_pengunjung` SET `nim` = '".$nim."', `nama` = '".$nama."', `kelas` = '".$kelas."', `no_handphone` = '".$no_handphone."', `alamat` = '".$alamat."' 
    WHERE `data_pengunjung`.`id_pengunjung` = ".$id.";";
    // echo $sql;

    //Running Query
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "Update pengunjung buku berhasil";
    }else {
        $msg = "Update data pengunjung gagal";
    }

    $response = array (
        'status'=>'OK',
        'msg'=>$msg
    );

    echo json_encode($response);
?>
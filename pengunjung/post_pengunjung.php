<?php
    //Koneksi ke database mysql
    include "../config/conn.php";

    //Mendapatkan variabel post
    $nim = isset($_POST["nim"]) ? $_POST["nim"] : "";
    $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
    $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : "";
    $no_handphone = isset($_POST['no_handphone']) ? $_POST['no_handphone'] : "";
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
   
    $sql = "INSERT INTO `data_pengunjung` (`nim`, `nama`, `kelas`, `no_handphone`, `alamat`) 
    VALUES ('".$nim."', '".$nama."', '".$kelas."', '".$no_handphone."', '".$alamat."');";
    // echo $sql;
    //Running Query
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "Simpan data pengunjung berhasil";
    }else {
        $msg = "Simpan data pengunjung gagal";
    }

    // echo $msg;
    // echo 'test';
    $response = array (
        'status'=>'OK',
        'msg'=>$msg
    );

    echo json_encode($response);
?>
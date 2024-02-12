<?php
    session_start();
    //Membuat koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "db_perpustakaan");

    //Menambah MultiUser
    if(isset($_POST['tambahmultiuser'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $simpan = mysqli_query($conn,"INSERT INTO `multiuser` (`id`, `nama`, `username`, `password`, `level`) VALUES (NULL, '$nama', '$username', '$password', '$level')");
        if($simpan){
            header('location:index.php');
        } else {
            echo 'Gagal Menambahkan Pengguna';
            header('location:register.php');
        }

    }

    //Menambah Buku
    if(isset($_POST['tambahbuku'])){
        $idbuku = $_POST['id_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $isbn = $_POST['isbn'];
        $kategori = $_POST['kategori'];
        $jumlah_buku = $_POST['jumlah_buku'];

        $simpan = mysqli_query($conn,"INSERT INTO `data_buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `kategori`, `jumlah_buku`) VALUES (NULL, '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$isbn', '$kategori', '$jumlah_buku')");
        if($simpan){
            header('location:buku.php');
        } else {
            echo 'Gagal Menambahkan Buku';
            header('location:buku.php');
        }
    };

    //Menambah Pengunjung
    if(isset($_POST['tambahpengunjung'])){
        $idpengunjung = $_POST['id_pengunjung'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $no_handphone = $_POST['no_handphone'];
        $alamat = $_POST['alamat'];

        $simpan = mysqli_query($conn,"INSERT INTO `data_pengunjung` (`id_pengunjung`, `nim`, `nama`, `kelas`, `no_handphone`, `alamat`) VALUES (NULL, '$nim', '$nama', '$kelas', '$no_handphone', '$alamat')");
        if($simpan){
            header('location:pengunjung.php');
        } else {
            echo 'Gagal Menambahkan Pengunjung';
            header('location:pengunjung.php');
        }

    }

    //Menambah Transaksi
    if(isset($_POST['tambahtransaksi'])){
        $idtransaksi = $_POST['id_transaksi'];
        $bukunya = $_POST['bukunya'];
        $pengunjungnya = $_POST['pengunjungnya'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];

        $simpan = mysqli_query($conn,"INSERT INTO `data_transaksi` (`id_transaksi`, `id_buku`, `id_pengunjung`, `tanggal`, `keterangan`) VALUES ('$idtransaksi', '$bukunya', '$pengunjungnya', '$tanggal', '$keterangan')");
        if($simpan){
            header('location:transaksi.php');
        } else {
            echo 'Gagal Menambahkan Transaksi';
            header('location:transaksi.php');
        }

    }

    //Mengubah Buku
    if(isset($_POST['ubahbuku'])){
        $idbuku = $_POST['id_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $isbn = $_POST['isbn'];
        $kategori = $_POST['kategori'];
        $jumlah_buku = $_POST['jumlah_buku'];

        $ubah = mysqli_query($conn, "UPDATE data_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', isbn='$isbn', kategori='$kategori', jumlah_buku='$jumlah_buku' WHERE id_buku = '$idbuku'");
        if($ubah){
            header('location:buku.php');
        } else {
            echo 'Gagal Mengubah Buku';
            header('location:buku.php');
        }
    }

    //Menghapus Buku
    if(isset($_POST['hapusbuku'])){
        $idbuku = $_POST['id_buku'];

        $hapus = mysqli_query($conn, "DELETE FROM data_buku WHERE id_buku='$idbuku'");
        if($hapus){
            header('location:buku.php');
        } else {
            echo 'Gagal Menghapus Buku';
            header('location:buku.php');
        }
    }

     //Mengubah Pengunjung
     if(isset($_POST['ubahpengunjung'])){
        $idpengunjung = $_POST['id_pengunjung'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $no_handphone = $_POST['no_handphone'];
        $alamat = $_POST['alamat'];

        $ubah = mysqli_query($conn, "UPDATE `data_pengunjung` SET nim='$nim', nama='$nama', kelas='$kelas', no_handphone='$no_handphone', alamat='$alamat' WHERE id_pengunjung = '$idpengunjung'");
        if($ubah){
            header('location:pengunjung.php');
        } else {
            echo 'Gagal Mengubah Pengunjung';
            header('location:pengunjung.php');
        }
    }

    //Menghapus Pengunjung
    if(isset($_POST['hapuspengunjung'])){
        $idpengunjung = $_POST['id_pengunjung'];

        $hapus = mysqli_query($conn, "DELETE FROM `data_pengunjung` WHERE id_pengunjung='$idpengunjung'");
        if($hapus){
            header('location:pengunjung.php');
        } else {
            echo 'Gagal Menghapus Pengunjung';
            header('location:pengunjung.php');
        }
    }

    //Mengubah transaksi
    if(isset($_POST['ubahtransaksi'])){
        $idtransaksi = $_POST['id_transaksi'];
        $bukunya = $_POST['bukunya'];
        $pengunjungnya = $_POST['pengunjungnya'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
    
        $ubah = mysqli_query($conn, "UPDATE `data_transaksi` SET id_transaksi='$idtransaksi', id_buku='$bukunya', id_pengunjung='$pengunjungnya', tanggal='$tanggal', keterangan='$keterangan' WHERE id_transaksi = '$idtransaksi'");
        if($ubah){
            header('location:transaksi.php');
        } else {
            echo 'Gagal Mengubah Transaksi';
            header('location:transaksi.php');
        }
    }
    
    //Menghapus transaksi
    if(isset($_POST['hapustransaksi'])){
        $idtransaksi = $_POST['id_transaksi'];
    
        $hapus = mysqli_query($conn, "DELETE FROM `data_transaksi` WHERE id_transaksi='$idtransaksi'");
        if($hapus){
            header('location:transaksi.php');
        } else {
            echo 'Gagal Menghapus Transaksi';
            header('location:transaksi.php');
        }
    }

?>
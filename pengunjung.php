<?php
require 'function.php';
// require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Pengunjung</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="beranda.php">Perpustakaan</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"><?php echo $_SESSION['username']; ?> (<?php echo $_SESSION['level']; ?>)</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda ingin keluar dari halaman ini?')">Logout</a>
                    </div>
                </li>
            </ul>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="beranda.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Beranda
                        </a>
                        <a class="nav-link" href="buku.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Data Buku
                        </a>
                        <a class="nav-link" href="pengunjung.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Data Pengunjung
                        </a>
                        <?php if ($_SESSION['level']=="admin") { ?>
                        <a class="nav-link" href="transaksi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Data Transaksi
                        </a>
                        <?php } ?>
                        <a class="nav-link" href="tentang.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                            Tentang
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Tampilan Data Pengunjung</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <?php if ($_SESSION['level']=="admin") { ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Pengunjung
                            </button>
                            <button type="button" class="btn btn-danger" style="float: right;">
                                <a href="laporanpengunjung.php" target="_blank" style="color: white; text-decoration: none;">Cetak PDF</a>
                            </button>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>No Handphone</th>
                                            <th>Alamat</th>
                                            <?php if ($_SESSION['level']=="admin") { ?>
                                            <th>Aksi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $ambil = mysqli_query($conn, "SELECT * FROM data_pengunjung");
                                        $no = 1;

                                        while ($data = mysqli_fetch_array($ambil)) {
                                            $idpengunjung = $data['id_pengunjung'];
                                            $nim = $data['nim'];
                                            $nama = $data['nama'];
                                            $kelas = $data['kelas'];
                                            $no_handphone = $data['no_handphone'];
                                            $alamat = $data['alamat'];
                                        ?>

                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $nim; ?></td>
                                                <td><?= $nama; ?></td>
                                                <td><?= $kelas; ?></td>
                                                <td><?= $no_handphone; ?></td>
                                                <td><?= $alamat; ?></td>
                                                <td>
                                                <?php if ($_SESSION['level']=="admin") { ?>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah<?= $idpengunjung; ?>">
                                                        Ubah
                                                    </button>
                                                    <input type="hidden" name="hapus" value="<?= $idpengunjung; ?>">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $idpengunjung; ?>">
                                                        Hapus
                                                    </button>
                                                <?php } ?>
                                                </td>
                                            </tr>

                                            <!-- Ubah Modal -->
                                            <div class="modal fade" id="ubah<?= $idpengunjung; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ubah Pengunjung</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="text" name="id_pengunjung" value="<?= $idpengunjung; ?>" class="form-control" required readonly><br>
                                                                <input type="text" name="nim" value="<?= $nim; ?>" class="form-control" required> <br>
                                                                <input type="text" name="nama" value="<?= $nama; ?>" class="form-control" required> <br>
                                                                <select name="kelas" value="<?= $kelas; ?>" class="form-control" required>
                                                                    <option value="TIF RM 221MA" <?php if ($kelas == 'TIF RM 221MA') {
                                                                                                        echo "selected";
                                                                                                    } ?>>TIF RM 221MA</option>
                                                                    <option value="DKV RM 221MA" <?php if ($kelas == 'DKV RM 221MA') {
                                                                                                            echo "selected";
                                                                                                        } ?>>DKV RM 221MA</option>
                                                                    <option value="TI RP 220MA" <?php if ($kelas == 'TI RP 220MA') {
                                                                                                        echo "selected";
                                                                                                    } ?>>TI RP 220MA</option>
                                                                    <option value="BD RP 221MC" <?php if ($kelas == 'BD RP 221MC') {
                                                                                                                    echo "selected";
                                                                                                                } ?>>BD RP 221MC</option>
                                                                </select> <br>
                                                                <input type="text" name="no_handphone" value="<?= $no_handphone; ?>" class="form-control" required> <br>
                                                                <input type="text" name="alamat" value="<?= $alamat; ?>" class="form-control" required> <br>
                                                                <input type="hidden" name="id_pengunjung" value="<?= $idpengunjung; ?>">
                                                                <button type="submit" class="btn btn-primary" name="ubahpengunjung">Simpan</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hapus Modal -->
                                            <div class="modal fade" id="hapus<?= $idpengunjung; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Pengunjung</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus <?= $nim; ?>?
                                                                <input type="hidden" name="id_pengunjung" value="<?= $idpengunjung; ?>">
                                                                <br> <br>
                                                                <button type="submit" class="btn btn-danger" name="hapuspengunjung">Hapus</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                        <?php
                                        };

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                <div class="text-muted text-center">Copyright &copy; Ardi Permana (18111406) TIF RM 221MA</div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pengunjung</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <!-- <input type="text" name="id_pengunjung" placeholder="ID Pengunjung" class="form-control" required><br> -->
                    <input type="text" name="nim" placeholder="NIM" class="form-control" required> <br>
                    <input type="text" name="nama" placeholder="Nama" class="form-control" required> <br>
                    <select name="kelas" class="form-control" required>
                        <option value="TIF RM 221MA">TIF RM 221MA</option>
                        <option value="DKV RM 221MA">DKV RM 221MA</option>
                        <option value="TI RP 220MA">TI RP 220MA</option>
                        <option value="BD RP 221MC">BD RP 221MC</option>
                    </select> <br>
                    <input type="text" name="no_handphone" placeholder="No Handphone" class="form-control" required> <br>
                    <input type="text" name="alamat" placeholder="Alamat" class="form-control" required> <br>
                    <button type="submit" class="btn btn-primary" name="tambahpengunjung">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

</html>
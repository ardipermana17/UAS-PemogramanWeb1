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
    <title>Data Transaksi</title>
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
                        <a class="nav-link" href="transaksi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Data Transaksi
                        </a>
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
                    <h1 class="mt-4">Tampilan Data Transaksi</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Transaksi
                            </button>
                            <button type="button" class="btn btn-danger" style="float: right;">
                                <a href="laporantransaksi.php" target="_blank" style="color: white; text-decoration: none;">Cetak PDF</a>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Buku</th>
                                            <th>ID Pengunjung</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $ambil = mysqli_query($conn, "SELECT * FROM data_transaksi");
                                        $no = 1;

                                        while ($data = mysqli_fetch_array($ambil)) {
                                            $idtransaksi = $data['id_transaksi'];
                                            $idbuku = $data['id_buku'];
                                            $idpengunjung = $data['id_pengunjung'];
                                            $tanggal = $data['tanggal'];
                                            $keterangan = $data['keterangan'];
                                        ?>

                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $idbuku; ?></td>
                                                <td><?= $idpengunjung; ?></td>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= $keterangan; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah<?= $idtransaksi; ?>">
                                                        Ubah
                                                    </button>
                                                    <input type="hidden" name="hapus" value="<?= $idtransaksi; ?>">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $idtransaksi; ?>">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Ubah Modal -->
                                            <div class="modal fade" id="ubah<?= $idtransaksi; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ubah Transaksi</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="text" name="id_transaksi" value="<?= $idtransaksi; ?>" class="form-control" required readonly><br>
                                                                <select name="pengunjungnya" class="form-control">
                                                                    <?php
                                                                    $ambilpengunjung = mysqli_query($conn, "SELECT * FROM data_pengunjung");
                                                                    while ($fetcharray = mysqli_fetch_array($ambilpengunjung)) {

                                                                        $idpengunjungnya = $fetcharray['id_pengunjung'];

                                                                    ?>
                                                                        <option value="<?= $idpengunjungnya; ?>"><?= $idpengunjungnya; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select> <br>
                                                                <select name="bukunya" class="form-control">
                                                                    <?php
                                                                    $ambilbuku = mysqli_query($conn, "SELECT * FROM data_buku");
                                                                    while ($fetcharray = mysqli_fetch_array($ambilbuku)) {

                                                                        $idbukunya = $fetcharray['id_buku'];

                                                                    ?>
                                                                        <option value="<?= $idbukunya; ?>"><?= $idbukunya; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select> <br>
                                                                <input type="date" name="tanggal" value="<?= $tanggal; ?>" class="form-control" required> <br>
                                                                <input type="text" name="keterangan" value="<?= $keterangan; ?>" class="form-control" required> <br>
                                                                <input type="hidden" name="id_transaksi" value="<?= $idtransaksi; ?>">
                                                                <button type="submit" class="btn btn-primary" name="ubahtransaksi">Simpan</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hapus Modal -->
                                            <div class="modal fade" id="hapus<?= $idtransaksi; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus transaksi</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus <?= $idtransaksi; ?>?
                                                                <input type="hidden" name="id_transaksi" value="<?= $idtransaksi; ?>">
                                                                <br> <br>
                                                                <button type="submit" class="btn btn-danger" name="hapustransaksi">Hapus</button>
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
                <h4 class="modal-title">Tambah Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <select name="pengunjungnya" class="form-control">
                        <?php
                        $ambilpengunjung = mysqli_query($conn, "SELECT * FROM data_pengunjung");
                        while ($fetcharray = mysqli_fetch_array($ambilpengunjung)) {

                            $idpengunjungnya = $fetcharray['id_pengunjung'];

                        ?>
                            <option value="<?= $idpengunjungnya; ?>"><?= $idpengunjungnya; ?></option>
                        <?php
                        }
                        ?>
                    </select> <br>
                    <select name="bukunya" class="form-control">
                        <?php
                        $ambilbuku = mysqli_query($conn, "SELECT * FROM data_buku");
                        while ($fetcharray = mysqli_fetch_array($ambilbuku)) {

                            $idbukunya = $fetcharray['id_buku'];

                        ?>
                            <option value="<?= $idbukunya; ?>"><?= $idbukunya; ?></option>
                        <?php
                        }
                        ?>
                    </select> <br>
                    <input type="date" name="tanggal" class="form-control" required> <br>
                    <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" required> <br>
                    <button type="submit" class="btn btn-primary" name="tambahtransaksi">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

</html>
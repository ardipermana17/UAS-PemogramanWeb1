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
    <title>Tentang Perpustakaan</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
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
                        <?php if ($_SESSION['level'] == "admin") { ?>
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
                <div class="container-fluid text-justify ">
                    <h1 class="mt-4 fw-semibold fs-1">Peran Perpustakaan</h1>
                    <p class="fw-medium fs-5">
                        Perpustakaan merupakan upaya untuk memelihara dan meningkattkan efisiensi dan efektifitas proses belajar-mengajar.
                        Perpustakaan yang terorganisir secara baik dan sisitematis,
                        secara langsung atau pun tidak langsung dapat memberikan kemudahan bagi proses belajar mengajar di sekolah tempat perpustakaan tersebut berada.
                        Hal ini, trekait dengan kemajuan bidang pendidikan dan dengan adanya perbaikan metode belajar-mengajar yang dirasakan tidak bisa dipisahkan dari masalah penyediaan fasilitas dan sarana pendidikan.
                    </pclass=> <br><br>
                    <h3 class="fw-semibold fs-1">Visi</h3>
                    <p class="fw-medium fs-5">
                        Mengembangkan Perpustakan Online ini menjadi Perpustakaan yang unggul untuk mendukung dalam pencarian buku.
                    </p><br><br>
                    <h3 class="fw-semibold fs-1">Misi</h3>
                    <ol class="fw-medium fs-5">
                        <li>Menyediakan sarana dan prasarana yang memadai sebagai pusat kegiatan pembelajaran yang didukung oleh teknologi informasi.</li>
                        <li>Menyediakan koleksi bahan pustaka yang terkini dan relevan untuk menunjang kegiatan pembelajaran, penelitian, dan pengabdian kepada masyarakat.</li>
                        <li>Memberikan Layanan Informasi Pustaka Secara Efektif dan Efisien.</li>
                    </ol>
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

</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Logistik Jims Honey Medan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
                Logistik
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Stok Barang</div>
                            <a class="nav-link" href="DbLogistik">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>                         
                           
                            
                           <div class="sb-sidenav-menu-heading">Data Barang</div>
                           <a class="nav-link" href="Logistik">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Stok Barang
                            </a>
                            <a class="nav-link" href="Brgmasuk">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="Brgkeluar">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Barang Keluar
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Logistik Jims Honey Medan</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Barang
                            </button>
                            </div>
                            <div class="card-body">
<table id="datatablesSimple">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barang as $brg): ?>
            <tr>
                <td><?php echo $brg->idbarang; ?></td>
                <td><?php echo $brg->nama_brg; ?></td>
                <td><?php echo $brg->desk; ?></td>
                <td><?php echo $brg->stok; ?></td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo $brg->idbarang; ?>">Edit</button>
                    <a href="<?php echo site_url('logistik/delete_barang/'.$brg->idbarang); ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus?');">Hapus</a>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal<?php echo $brg->idbarang; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Barang</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo site_url('logistik/edit_barang'); ?>" method="POST">
                                <input type="hidden" name="idbarang" value="<?php echo $brg->idbarang; ?>">
                                <div class="form-group">
                                    <label for="idbarang">ID Barang</label>
                                    <input type="text" class="form-control" name="idbarang" value="<?php echo $brg->idbarang; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_brg">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_brg" value="<?php echo $brg->nama_brg; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="desk">Keterangan</label>
                                    <input type="text" class="form-control" name="desk" value="<?php echo $brg->desk; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Jumlah Stok</label>
                                    <input type="text" class="form-control" name="stok" value="<?php echo $brg->stok; ?>" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </tbody>
</table>


                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 202370045</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Barang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo site_url('logistik/add_barang'); ?>" method="POST">

            <input type="text" name="nama_brg" placeholder="Nama Barang" class="form-control" required>
            <br>
            <input type="text" name="desk" placeholder="Keterangan" class="form-control" required>
            <br>
            <input type="number" name="stok" placeholder="Jumlah" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary" name="tambahbarang">Tambahkan</button>

        </form> 
      </div>

    </div>
  </div>
</div>

<<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>
<link rel="stylesheet" href='assets/css/bootstrap.min.css'>
<link rel="stylesheet" href='assets/css/style.css'>
<script src='assets/js/bootstrap.min.js'></script>
<script src='assets/js/main.js'></script>


</html>

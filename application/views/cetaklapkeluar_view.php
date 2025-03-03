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
        <title>Barang Keluar - Logistik Jims Honey Medan</title>
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
                    <br>
                        <div class="card mb-4">
                            <div class="card-header">
                            <h2 class="mt-4">Cetak Laporan Barang Keluar</h2>
                            
                            </div>

<div class="card-body">
<div>
        <label for="filter_by_name">Filter by Name:</label>
        <input type="text" id="filter_by_name" placeholder="Enter name">
        
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date">
        
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date">
        
        <button type="button" class="btn btn-primary" onclick="filterReport()">Filter Report</button>
    </div>

    <a id="print_link" href="<?php echo site_url('brgkeluar/print_report'); ?>" target="_blank">
        <button type="button" class="btn btn-secondary">Cetak Laporan</button>
    </a>

    <script>
        function filterReport() {
            var name = document.getElementById('filter_by_name').value;
            var start_date = document.getElementById('start_date').value;
            var end_date = document.getElementById('end_date').value;
            var print_link = document.getElementById('print_link');
            print_link.href = "<?php echo site_url('brgkeluar/print_report'); ?>?name=" + name + "&start_date=" + start_date + "&end_date=" + end_date;
        }
    </script>



                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Jims Honey Logistik @ 2025</div>
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

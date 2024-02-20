<?php
require 'function.php';

$tr = mysqli_query($conn,"SELECT * FROM tb_barang");
$keranjang = mysqli_query($conn,"SELECT * FROM tb_keranjang");




if(isset($_POST['Cariharga'])){
    $bd = $_POST['nama_barang'];
    $r = $_POST['quantity'];
    $query = mysqli_query($conn,"SELECT harga FROM tb_barang WHERE nama_barang='$bd'");
    $harga = mysqli_fetch_assoc($query);
    $data = $harga['harga'];
}

    


if(isset($_POST['hitung'])){
        $bd = $_POST['nama_barang'];
        $r = $_POST['quantity'];
        $query = mysqli_query($conn,"SELECT harga FROM tb_barang WHERE nama_barang='$bd'");
        $harga = mysqli_fetch_assoc($query);
        $data = $harga['harga'];
        $hasil = intval($r) * intval($data);

        
}


if(isset($_POST['Masuk-keranjang'])){
    $nama = $_POST['nama_barang'];
    $hrg = $_POST['harga'];
    $qty = $_POST['quantity'];
    $subtotal = $_POST['subtotal'];
    $sql = mysqli_query($conn,"INSERT INTO tb_keranjang (nama, harga_jual, qty, subtotal) VALUES ('$nama',$hrg,$qty,$subtotal);");
    header("Location:transaksi.php");


}

if(isset($_POST['btn-bayar'])){
    $h = $_POST['bayar'];
    $qry = mysqli_query($conn,"INSERT INTO tb_bayar (bayar) VALUES ($h)");
    
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>

                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="laporan.php" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pelanggan.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Data Pelanggan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="penjualan.php" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Penjualan

                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="transaksi.php" class="nav-link active">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Data Transaksi

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="barang.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Data Barang

                                </p>
                            </a>

                        </li>
                        <li class="nav-header">Menu Lainnya</li>
                        <li class="nav-item">
                            <a href="bantuan.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Bantuan
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">LABELS</li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-5 ml-4">
                            <!-- general form elements -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Kasir</h3>
                                </div>
                                <form class="form-horizontal" action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="tgl-transaksi" class="col-sm-2 col-form-label">Tgl</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="tgl-transaksi"
                                                    placeholder="" value="<?= date("d F Y")?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_barang" class="col-sm-2 col-form-label">Barang</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="nama_barang" placeholder=""
                                                    list="datalist" autocomplete="off" name="nama_barang"
                                                    value="<?php echo isset($_POST['nama_barang']) ? $_POST['nama_barang'] : ''; ?>"
                                                    autofocus>
                                                <datalist id="datalist">
                                                    <?php while($row = mysqli_fetch_assoc($tr))
                                                    : ?>
                                                    <option value="<?=$row['nama_barang']?>"></option>
                                                    <?php endwhile; ?>
                                                </datalist>
                                            </div>
                                            <button name="Cariharga" class="btn btn-primary mb-1 mt-1">Cari
                                                Harga</button>
                                        </div>


                                        <div class="form-group row">
                                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-6">
                                                <input type="number" name="harga" class="form-control" id="harga"
                                                    placeholder="" value="<?=$data?>">
                                            </div>
                                        </div>

                                        <div class=" form-group row">
                                            <label for="quantity" class="col-sm-2 col-form-label">Qty</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="" placeholder="Input"
                                                    name="quantity" value="<?=$r;?>" autofocus>
                                            </div>
                                            <button name="hitung" class="btn btn-primary mb-1 mt-1 ">Hitung</button>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sub-total" class="col-sm-2 col-form-label">Total</label>
                                            <div class="col-sm-6">
                                                <input type="number" name="subtotal" class="form-control" id=""
                                                    placeholder="" value="<?=$hasil?>" autofocus>
                                            </div>
                                        </div>
                                        <button class="btn bg-success mt-2" name="Masuk-keranjang">Tambah
                                            Keranjang</button>
                                        <hr>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <!-- Keranjang -->
                        <div class="card col-md-6 ml-5">
                            <div class="card-header bg-light">
                                <h3 class="card-title"><i class="bi bi-cart4"></i> Keranjang</h3>
                                <div class="reset text-right">
                                    <a href="reset_keranjang.php" class="bg-success rounded p-1 m-0"><i
                                            class="bi bi-arrow-clockwise"></i> Reset Keranjang</a>
                                </div>
                            </div>
                            <div class="keranjang m-3 p-2">
                                <?php
                                        $tanggal = date("d");
                                        $bulan = date("m");
                                        $tahun = date("y")
                                        
                                        ?>
                                <form action="" method="post" id="">

                                    <table id="tableToPrint" border="0" class="table table-hover mt-2">
                                        <div class="toko-mardood text-center" id="">
                                            <h1>Toko Mardood</h1>
                                            <p>Jl. Dusun Palasari, Desa Ekasari</p>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>Nama barang</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $totalbayar = 0;
                                                $bayar = 0;
                                                $hasil = 0;
                                                
     
                                                    while($kr = mysqli_fetch_assoc($keranjang)):
                                                       
                                                        
                                                        $subtotal = $kr['subtotal'];
                                                        $totalbayar += $subtotal;
                                                        
                                                        if(isset($_POST['bayar'])){
                                                            
                                                            $bayar = $_POST['bayar'];
                                                            $hasil = intval($bayar) - intval($totalbayar);
                                                        } 
                                        
                                                    
                                        
                                            ?>
                                            <tr>
                                                <td><?=$kr['nama']?></td>
                                                <td class="text-center">
                                                    <?= 'Rp ' . number_format($kr['harga_jual'], 0, ',', '.'). '' ?>
                                                </td>
                                                <td><?=$kr['qty']?></td>
                                                <td class="formatted-price text-center">
                                                    <?= 'Rp ' . number_format((float) $kr['subtotal'], 0, ',', '.') ?>
                                                </td>
                                                <td>
                                                    <a href="hapus_keranjang.php?id=<?=$kr['id']?>"><i
                                                            class="bi bi-x"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                endwhile;
                                            
                                            
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sub total</th>
                                                <th></th>
                                                <th></th>

                                                <th class="formatted-price text-center">
                                                    <?= 'Rp ' . number_format((float) $totalbayar, 0, ',', '.') ?>

                                                </th>

                                            </tr>
                                            <tr>
                                                <th>Bayar</th>
                                                <th></th>
                                                <th></th>
                                                <th class="formatted-price text-center">
                                                    <?= 'Rp ' . number_format((float) $bayar, 0, ',', '.') ?>

                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Kembali</th>
                                                <th></th>
                                                <th></th>
                                                <th class="formatted-price text-center">
                                                    <?= 'Rp ' . number_format((float) $hasil, 0, ',', '.') ?>

                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <hr>

                                    <div class="form-group row">
                                        <label for="sub-total"
                                            class="col-sm-3 col-form-label bg-primary-emphasis">Bayar</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control formatted-price " id="bayar"
                                                placeholder="" name="bayar" required>
                                        </div>
                                        <button type="submit" name="btn-bayar" class="btn btn-bayar bg-white mt-2 ml-2">
                                        </button>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sub-total" class="col-sm-3 col-form-label">Kembali</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="" placeholder=""
                                                value="<?= isset($hasil) ? number_format($hasil, 0, ',', '.') : ''; ?>">
                                        </div>
                                    </div>
                                </form>
                                <div class="text-right mr-5">
                                    <a href="cetak.php">Print</a>
                                </div>
                                <script>

                                </script>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->







    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>

    <!-- daterangepicker -->
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assets/dist/js/pages/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
<?php

require 'function.php';


$cetak = mysqli_query($conn,"SELECT * FROM tb_keranjang");
// Melakukan kueri ke database
$buy = mysqli_query($conn,"SELECT * FROM tb_bayar ORDER BY id_bayar DESC LIMIT 1;");










?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Nota</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

<style>
/* Gaya cetak */
@media print {
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }

    .nota {
        max-width: 120mm;
        /* Ubah lebar kertas sesuai kebutuhan Anda */
        margin: 1px;
        padding: 9px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 0px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
    }

    h2,
    p {
        text-align: center;
        color: #333;
    }

    table {
        margin-top: 2rem;
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 0px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .text-center {
        text-align: center;
        margin-left: -3rem;
    }

    @page {
        size: 70mm 120mm;
        margin: 0;
    }

    @media print {
        .table {
            width: 87%;
            border-collapse: collapse;
            margin: 1px;

        }

        body {
            font-size: 0.2rem;
        }
    }
}
</style>

<body>
    <div class="nota">
        <div class="header">
            <h2 class="text-center">Toko Mardood</h2>
            <p class="text-center">Jl Dusun Palasari</p>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th class="text-center">Harga Jual</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                $bayar = 0;
                $kembali = 0;
                while ($r = mysqli_fetch_assoc($cetak)):
                    $sub = $r['subtotal'];
                    $hs = $total += $sub;

                   
                
            ?>
                <tr>
                    <td class="small"><?= $r['nama'] ?></td>
                    <td class="text-center small">
                        <?= 'Rp ' . number_format($r['harga_jual'], 0, ',', '.') . '' ?>
                    </td>
                    <td class="text-center small"><?= $r['qty'] ?></td>
                    <td class="formatted-price text-center small">
                        <?= 'Rp ' . number_format((float) $r['subtotal'], 0, ',', '.') ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Subtotal</th>
                    <th></th>
                    <th></th>
                    <th class="formatted-price text-center small">
                        <?= 'Rp ' . number_format((float) $hs, 0, ',', '.') ?>
                    </th>
                </tr>
                <tr>
                    <th>Bayar</th>
                    <th></th>
                    <th></th>
                    <?php
                    
                    while($rer = mysqli_fetch_assoc($buy)):
                        $kembali = $rer['bayar'] - $hs;
                        
                    ?>
                    <th class="formatted-price text-center small">
                        <?= 'Rp ' . number_format((float) $rer['bayar'], 0, ',', '.'); endwhile;?>
                    </th>
                </tr>
                <tr>
                    <th>Kembali</th>
                    <th></th>
                    <th></th>

                    <th class="formatted-price text-center small">
                        <?= 'Rp ' . number_format((float) $kembali, 0, ',', '.');?>
                    </th>

                </tr>
            </tfoot>
        </table>
    </div>

    <script>
    window.print()
    </script>

</body>

</html>
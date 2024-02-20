<?php

require 'function.php';

$id_hapus_keranjang = $_GET['id'];

$hapus = mysqli_query($conn,"DELETE FROM tb_keranjang WHERE id = '$id_hapus_keranjang'");
header("Location:transaksi.php");

?>
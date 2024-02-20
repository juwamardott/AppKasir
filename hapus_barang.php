<?php

require 'function.php';

$id_hapus = $_GET['id'];

$hapus = mysqli_query($conn,"DELETE FROM tb_barang WHERE id_barang = '$id_hapus'");
header("Location:barang.php");

?>
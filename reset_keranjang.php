<?php
require 'function.php';
$qr = mysqli_query($conn, "DELETE FROM tb_keranjang");
$R = mysqli_query($conn,"TRUNCATE tb_bayar");

if($qr && $R= true){
    header("Location:transaksi.php");
}

?>
<?php
$conn = mysqli_connect("Localhost","root","","aplikasi kasir");

if(!$conn){
    echo 'Login Gagal';
}


function Cari($keyword){
    global $conn;
    $query = mysqli_query($conn,"SELECT * FROM tb_barang 
                                WHERE nama_barang LIKE '%$keyword%' OR
                                harga LIKE '%$keyword%' OR
                                jumlah LIKE '%$keyword%'
                                ");
    

    return $query;

}
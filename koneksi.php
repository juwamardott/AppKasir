<?php


$conn = mysqli_connect("Localhost","root","","aplikasi kasir");

if(!$conn){
    echo 'Login Gagal';
}
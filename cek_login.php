<?php

session_start();
require 'function.php';

if(isset($_POST['btn-login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo $username;
    echo $password;

    $query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

    $data = mysqli_num_rows($query);
    
    if($data > 0){
        header("Location:index.php");
    }
}






?>
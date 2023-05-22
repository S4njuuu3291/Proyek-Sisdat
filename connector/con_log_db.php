<?php 
    $host = 'localhost';
    $passwordsql = 'Jack2209';
    $username = 'root';
    $database = 'anterinaja';

    $email = $_POST['email'];
    $password = $_POST['password'];


    $koneksi = new mysqli($host, $username, $passwordsql, $database);
    if (!$koneksi){
        echo "failed";
    }
?>
<?php
    $host = 'localhost';
    $passwordsql = 'Jack2209';
    $username = 'root';
    $database = 'anterinaja';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $gender = $_POST['gender'];
    $no_Hp = $_POST['no_Hp'];
    $alamat = $_POST['alamat'];


    $koneksi = new mysqli($host, $username, $passwordsql, $database);
    if ($koneksi->connect_error){
        die('Koneksi gagal'.$koneksi->connect_error);
    } else if(!($_POST['password'] === $_POST['ulang'])){
        header("Location: ../templates/daftar.php?error=Password Do Not Match");
        exit();
    } else
    {
        $stmt = $koneksi->prepare("INSERT INTO user (email, password) VALUES (?,?);");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->close();
        $stmt1 = $koneksi->prepare("INSERT INTO customer (nama, alamat, usia, gender, email, no_Hp) VALUES (?,?,?,?,?,?);");
        $stmt1->bind_param("ssisss", $nama, $alamat, $usia, $gender, $email, $no_Hp);
        $stmt1->execute();
        $stmt1->close();
        $koneksi->close();
    }
    header("Location: ../templates/login.php");
    exit();
?>
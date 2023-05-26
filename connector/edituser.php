<?php
    $host = 'localhost';
    $passwordsql = 'Jack2209';
    $username = 'root';
    $database = 'anterinaja';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $status = $_POST['status'];


    $koneksi = new mysqli($host, $username, $passwordsql, $database);
    if ($koneksi->connect_error){
        die('Koneksi gagal'.$koneksi->connect_error);
    } else 
    { 
        $stmt = $koneksi->prepare("UPDATE user SET 
        email = ?, password = ?, status = ? WHERE email = ?;");
        $stmt->bind_param("ssss", $email, $password, $status, $email);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: ../templates/user.php");
    exit();
?>
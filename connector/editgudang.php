<?php
    $host = 'localhost';
    $passwordsql = 'Jack2209';
    $username = 'root';
    $database = 'anterinaja';

    $id_gudang = $_POST['id_gudang'];
    $alamat = $_POST['alamat'];
    $tanggal_kirim = $_POST['tanggal_kirim'];
    $tanggal_simpan = $_POST['tanggal_simpan'];


    $koneksi = new mysqli($host, $username, $passwordsql, $database);
    if ($koneksi->connect_error){
        die('Koneksi gagal'.$koneksi->connect_error);
    } else 
    { 
        $stmt = $koneksi->prepare("UPDATE gudang SET 
        alamat = ?, tanggal_kirim = ?, tanggal_simpan = ?
        WHERE id_gudang = ?;");
        $stmt->bind_param("sssi", $alamat, $tanggal_kirim, $tanggal_simpan, $id_gudang);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: ../templates/gudang.php");
    exit();
?>
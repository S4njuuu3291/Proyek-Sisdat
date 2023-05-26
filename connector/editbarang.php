<?php
    $host = 'localhost';
    $passwordsql = 'Jack2209';
    $username = 'root';
    $database = 'anterinaja';

    $id_barang = $_POST['id_barang'];
    $id_customer = $_POST['id_customer'];
    $alamat_penerima = $_POST['alamat_penerima'];
    $no_Hp_penerima = $_POST['no_Hp_penerima'];
    $nama_penerima = $_POST['nama_penerima'];
    $tanggal_kirim = $_POST['tanggal_kirim'];
    $tanggal_sampai = $_POST['tanggal_sampai'];
    $id_kurir = $_POST['id_kurir'];
    $id_gudang = $_POST['id_gudang'];
    $status_barang = $_POST['status_barang'];


    $koneksi = new mysqli($host, $username, $passwordsql, $database);
    if ($koneksi->connect_error){
        die('Koneksi gagal'.$koneksi->connect_error);
    } else 
    { 
        $stmt = $koneksi->prepare("UPDATE barang SET 
        id_customer = ?, alamat_penerima = ?, no_Hp_penerima = ?, nama_penerima = ?,
        tanggal_kirim = ?, tanggal_sampai = ?, id_kurir = ?, id_gudang = ?, status_barang = ?
        WHERE id_barang = ?;");
        $stmt->bind_param("isssssiisi", $id_customer, $alamat_penerima, $no_Hp_penerima, $nama_penerima, $tanggal_kirim, 
    $tanggal_sampai, $id_kurir, $id_gudang, $status_barang, $id_barang);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: ../templates/barang.php");
    exit();
?>
<?php 
    $id_barang = $_POST['id_barang'];
    $servername = "localhost";
    $username = "root";
    $password = "Jack2209";
    $dbname = "anterinaja";
    
    $koneksi = new mysqli($servername, $username, $password, $dbname);
    if ($koneksi->connect_error){
        die('Koneksi gagal'.$koneksi->connect_error);
    } else
    {
        $stmt1 = $koneksi->prepare("DELETE FROM barang WHERE id_barang = ?;");
        $stmt1->bind_param("i", $id_barang);
        $stmt1->execute();
        $stmt1->close();
        $koneksi->close();
    }
    
    header("Location: ../templates/barang.php");
    exit();
?>
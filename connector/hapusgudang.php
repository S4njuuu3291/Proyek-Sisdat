<?php 
    $id_gudang = $_POST['id_gudang'];
    $servername = "localhost";
    $username = "root";
    $password = "Jack2209";
    $dbname = "anterinaja";
    
    $koneksi = new mysqli($servername, $username, $password, $dbname);
    if ($koneksi->connect_error){
        die('Koneksi gagal'.$koneksi->connect_error);
    } else
    {
        $stmt1 = $koneksi->prepare("DELETE FROM gudang WHERE id_gudang = ?;");
        $stmt1->bind_param("i", $id_gudang);
        $stmt1->execute();
        $stmt1->close();
        $koneksi->close();
    }
    
    header("Location: ../templates/gudang.php");
    exit();
?>
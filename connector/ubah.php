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
        $sql = "SELECT status_barang FROM barang WHERE id_barang = '$id_barang'";
        $hasil = $koneksi->query($sql);
        if ($hasil === 'Dikirim ke penerima '){
            $stmt = $koneksi->prepare("UPDATE barang SET status_barang = 'Sampai di penerima', tanggal_sampai = CURRENT_TIMESTAMP(), id_kurir = null WHERE id_barang = ?;");
            $stmt->bind_param("i", $id_barang);
            $stmt->execute();
            $stmt->close();
            $koneksi->close();
        } else {
            $stmt = $koneksi->prepare("UPDATE barang SET status_barang = 'Sampai di gudang ', tanggal_sampai = CURRENT_TIMESTAMP(), id_kurir = null WHERE id_barang = ?;");
            $stmt->bind_param("i", $id_barang);
            $stmt->execute();
            $stmt->close();
            $koneksi->close();
        }
        
    }
    header("Location: ../templates/kuriredit.php");
    exit();

?>
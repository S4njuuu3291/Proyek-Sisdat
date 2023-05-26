<?php
$host = 'localhost';
$passwordsql = 'Jack2209';
$username = 'root';
$database = 'anterinaja';

$alamat = $_POST['alamat'];
$tanggal_kirim = $_POST['tanggal_kirim'];
$tanggal_simpan = $_POST['tanggal_simpan'];


$koneksi = new mysqli($host, $username, $passwordsql, $database);
if ($koneksi->connect_error){
    die('Koneksi gagal'.$koneksi->connect_error);
} else 
{
    
        $stmt = $koneksi->prepare("INSERT INTO gudang(alamat, tanggal_kirim, tanggal_simpan) VALUE 
        (?,?,?);");
        $stmt->bind_param("sss", $alamat, $tanggal_kirim,$tanggal_simpan);
        $stmt->execute();
        $stmt->close();
        
        $koneksi->close();
        header("Location: ../templates/gudang.php");
        exit();
    
    
}
header("Location: ../templates/gudang.php");
exit();
?>
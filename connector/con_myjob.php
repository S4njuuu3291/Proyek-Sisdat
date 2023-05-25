<?php
session_start();
$email = $_SESSION['email'];
// Konfigurasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "Jack2209";
$dbname = "anterinaja";

$conn = new mysqli($servername, $username, $password, $dbname);
// Membuat koneksi
$sql = "SELECT barang.id_barang, barang.nama_penerima, barang.alamat_penerima, barang.status_barang,  gudang.alamat,
barang.no_Hp_penerima, barang.tanggal_kirim, barang.tanggal_sampai 
FROM barang 
JOIN kurir ON barang.id_kurir = kurir.id_kurir
JOIN user ON user.email = kurir.email
LEFT JOIN gudang ON gudang.id_gudang = barang.id_gudang
WHERE kurir.email = '$email';";
$nama = "SELECT nama FROM kurir WHERE email = '$email'";
$namaD = $conn->query($nama);
// Eksekusi query
$result = $conn->query($sql);
// Periksa apakah query berhasil dieksekusi
if ($result === false) {
    echo "Error: " . $conn->error;
    // Atau lakukan penanganan kesalahan sesuai kebutuhan Anda
} 
?>

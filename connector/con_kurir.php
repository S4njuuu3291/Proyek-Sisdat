<?php
// Konfigurasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "Jack2209";
$dbname = "anterinaja";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$sqlnama = "SELECT email FROM admin";
$hasil = $conn->query($sqlnama);
$baris = $hasil->fetch_assoc();
$email = $baris['email'];
$nama = "SELECT nama FROM admin WHERE email = '$email'";
$namaD = $conn->query($nama);
// Mengambil data dari tabel MySQL
$sql = "SELECT kurir.*, user.email FROM kurir
RIGHT JOIN user ON user.email = kurir.email
WHERE user.status = 'kurir'";
$result = $conn->query($sql);

// Menutup koneksi
$conn->close();
?>

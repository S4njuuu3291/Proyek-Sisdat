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
$sqlnama = "SELECT email FROM user";
$hasil = $conn->query($sqlnama);
$baris = $hasil->fetch_assoc();
$email = $baris['email'];
$nama = "SELECT COALESCE(admin.nama, customer.nama, kurir.nama) AS nama FROM user 
LEFT JOIN admin ON admin.email = user.email
LEFT JOIN kurir ON kurir.email = user.email
LEFT JOIN customer ON customer.email = user.email
WHERE user.email = '$email'";
$namaD = $conn->query($nama);
// Mengambil data dari tabel MySQL
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

// Menutup koneksi
$conn->close();
?>

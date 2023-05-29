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
$sql = "SELECT barang.id_barang, barang.tanggal_kirim, barang.alamat_penerima, barang.status_barang, gudang.alamat,
        barang.nama_penerima, barang.no_Hp_penerima, barang.tanggal_sampai
        FROM gudang 
        RIGHT JOIN barang ON gudang.id_gudang = barang.id_gudang
        JOIN customer ON barang.id_customer = customer.id_customer
        JOIN user ON user.email = customer.email
        WHERE customer.email = '$email' AND barang.status_barang != 'Sampai di penerima'";
$nama = "SELECT customer.nama FROM customer WHERE email = '$email'";
$namaD = $conn->query($nama);
// Eksekusi query
$result = $conn->query($sql);

// Periksa apakah query berhasil dieksekusi
if ($result === false) {
    echo "Error: " . $conn->error;
    // Atau lakukan penanganan kesalahan sesuai kebutuhan Anda
} 
?>

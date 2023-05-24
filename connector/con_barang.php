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

// Mengambil data dari tabel MySQL
$sql = "SELECT * FROM barang";
$result = $conn->query($sql);

// Menutup koneksi
$conn->close();

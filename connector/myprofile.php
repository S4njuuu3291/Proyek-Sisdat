<?php 
$servername = "localhost";
$username = "root";
$password = "Jack2209";
$dbname = "anterinaja";

$conn = new mysqli($servername, $username, $password, $dbname);
$status = "SELECT status FROM user WHERE email = '$email'";
$hasil = $conn->query($status);
$baris = $hasil->fetch_assoc();
if ($baris['status'] === 'customer'){
    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else if ($baris['status'] === 'admin'){
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    $sql = "SELECT * FROM kurir WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
$conn->close();
?>
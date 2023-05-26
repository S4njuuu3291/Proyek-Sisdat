<?php
$host = 'localhost';
$passwordsql = 'Jack2209';
$username = 'root';
$database = 'anterinaja';

$email = $_POST['email'];
$password = $_POST['password'];
$status = $_POST['status']; //post dari button

$nama = $_POST['nama'];
$usia = $_POST['usia'];
$gender = $_POST['gender'];
$no_Hp = $_POST['no_Hp'];


$koneksi = new mysqli($host, $username, $passwordsql, $database);
if ($koneksi->connect_error){
    die('Koneksi gagal'.$koneksi->connect_error);
} else 
{
    if ($status === 'admin'){
        $stmt1 = $koneksi->prepare("INSERT INTO user(email, password, status) VALUE 
        (?,?,?);");
        $stmt1->bind_param("sss", $email, $password, $status);
        $stmt1->execute();
        $stmt1->close();
        $stmt = $koneksi->prepare("INSERT INTO admin(nama, usia, gender, no_Hp, email) VALUE 
        (?,?,?,?,?);");
        $stmt->bind_param("sisss", $nama, $usia, $gender, $no_Hp, $email);
        $stmt->execute();
        $stmt->close();
        
        $koneksi->close();
        header("Location: ../templates/admin.php");
        exit();
    } else if ($status === 'kurir'){
        $stmt1 = $koneksi->prepare("INSERT INTO user(email, password, status) VALUE 
        (?,?,?);");
        $stmt1->bind_param("sss", $email, $password, $status);
        $stmt1->execute();
        $stmt1->close();
        $stmt = $koneksi->prepare("INSERT INTO kurir(nama, usia, gender, no_Hp, email) VALUE 
        (?,?,?,?,?);");
        $stmt->bind_param("sisss", $nama, $usia, $gender, $no_Hp, $email);
        $stmt->execute();
        $stmt->close();
        
        $koneksi->close();
        header("Location: ../templates/kurir.php");
        exit();
    }
    
    
}
header("Location: ../templates/login.php");
exit();
?>
<?php 
$servername = "localhost";
$username = "root";
$password = "Jack2209";
$dbname = "anterinaja";

$email = $_POST['email'];
$id = $_POST['id'];
$status = $_POST['status'];
$nama = $_POST['nama'];
$usia = $_POST['usia'];
$gender = $_POST['gender'];
$no_Hp = $_POST['no_Hp'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($status === 'admin'){
    $stmt = $conn->prepare("UPDATE admin SET 
    id_admin = ?, nama = ?, usia = ?, gender = ?, no_Hp = ?, email = ? WHERE id_admin = ?;");
    $stmt->bind_param("ssissss", $id, $nama, $usia, $gender, $no_Hp, $email, $id);
    $stmt->execute();
    $stmt->close();
    $admin = "SELECT admin.id_admin FROM admin RIGHT JOIN user ON user.email = admin.email WHERE user.email = '$email'";
    $h = $conn->query($admin);
    $b = $h->fetch_assoc();
    if ($b['id_admin'] === null){
        $stmt1 = $conn->prepare("INSERT INTO admin(nama, usia, gender, no_Hp, email) VALUES 
        (?,?,?,?,?);");
        $stmt1->bind_param("sisss", $nama, $usia, $gender, $no_Hp, $email);
        $stmt1->execute();
        $stmt1->close();
    }
    $conn->close();
    header("Location: ../templates/profiladmin.php");
    exit();
} else if ($status === 'kurir'){
    $stmt = $conn->prepare("UPDATE kurir SET 
    id_kurir = ?, nama = ?, usia = ?, gender = ?, no_Hp = ?, email = ? WHERE id_kurir = ?;");
    $stmt->bind_param("ssissss", $id, $nama, $usia, $gender, $no_Hp, $email, $id);
    $stmt->execute();
    $stmt->close();
    $kurir = "SELECT kurir.id_kurir FROM kurir RIGHT JOIN user ON user.email = kurir.email WHERE user.email = '$email'";
    $h = $conn->query($kurir);
    $b = $h->fetch_assoc();
    if ($b['id_kurir'] === null){
        $stmt1 = $conn->prepare("INSERT INTO kurir(nama, usia, gender, no_Hp, email) VALUES 
        (?,?,?,?,?);");
        $stmt1->bind_param("sisss", $nama, $usia, $gender, $no_Hp, $email);
        $stmt1->execute();
        $stmt1->close();
    }
    $conn->close();
    header("Location: ../templates/profilkurir.php");
    exit();
} else if ($status === 'customer'){
    $alamat = $_POST['alamat'];
    $stmt = $conn->prepare("UPDATE customer SET 
    id_customer = ?, nama = ?, usia = ?, gender = ?, no_Hp = ?, email = ?, alamat = ? WHERE id_customer = ?;");
    $stmt->bind_param("ssisssss", $id, $nama, $usia, $gender, $no_Hp, $email, $alamat, $id);
    $stmt->execute();
    $stmt->close();
    $customer = "SELECT customer.id_customer FROM customer RIGHT JOIN user ON user.email = customer.email WHERE user.email = '$email'";
    $h = $conn->query($customer);
    $b = $h->fetch_assoc();
    if ($b['id_customer'] === null){
        $stmt1 = $conn->prepare("INSERT INTO customer(nama, usia, gender, no_Hp, email, alamat) VALUES 
        (?,?,?,?,?,?);");
        $stmt1->bind_param("sissss", $nama, $usia, $gender, $no_Hp, $email, $alamat);
        $stmt1->execute();
        $stmt1->close();
        
    }
    $conn->close();
    header("Location: ../templates/profilcustomer.php");
    exit();
}
?>
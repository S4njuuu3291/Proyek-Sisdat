<?php 
    $email = $_POST['email'];
    $servername = "localhost";
    $username = "root";
    $password = "Jack2209";
    $dbname = "anterinaja";
    
    $koneksi = new mysqli($servername, $username, $password, $dbname);
    if ($koneksi->connect_error){
        die('Koneksi gagal'.$koneksi->connect_error);
    } else
    {
        $status = "SELECT status FROM user WHERE email = '$email'";
        $hasil = $koneksi->query($status);
        $baris = $hasil->fetch_assoc();
        if ($baris['status'] === 'admin'){
            $stmt = $koneksi->prepare("DELETE FROM admin WHERE email = ?;");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->close();
        } else if ($baris['status'] === 'customer'){
            $stmt = $koneksi->prepare("DELETE FROM customer WHERE email = ?;");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->close();
        } else if ($baris['status'] === 'kurir'){
            $stmt = $koneksi->prepare("DELETE FROM kurir WHERE email = ?;");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->close();
        }
        $stmt1 = $koneksi->prepare("DELETE FROM user WHERE email = ?;");
        $stmt1->bind_param("s", $email);
        $stmt1->execute();
        $stmt1->close();
        $koneksi->close();
    }
    
    header("Location: ../templates/user.php");
    exit();
?>
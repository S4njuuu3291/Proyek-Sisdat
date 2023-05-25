<?php
    $host = 'localhost';
    $passwordsql = 'Jack2209';
    $username = 'root';
    $database = 'anterinaja';

    $email = $_POST['email'];
    $id = $_POST['id'];

    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $gender = $_POST['gender'];
    $no_Hp = $_POST['no_Hp'];


    $koneksi = new mysqli($host, $username, $passwordsql, $database);
    if ($koneksi->connect_error){
        die('Koneksi gagal'.$koneksi->connect_error);
    } else 
    {
        $status = "SELECT status FROM user WHERE email = '$email'";
        $hasil = $koneksi->query($status);
        $baris = $hasil->fetch_assoc();
        if ($baris['status'] === 'admin'){
            $stmt = $koneksi->prepare("UPDATE admin SET 
            id_admin = ?, nama = ?, usia = ?, gender = ?, no_Hp = ?, email = ? WHERE id_admin = ?;");
            $stmt->bind_param("ssissss", $id, $nama, $usia, $gender, $no_Hp, $email, $id);
            $stmt->execute();
            $stmt->close();
            $admin = "SELECT admin.id_admin FROM admin RIGHT JOIN user ON user.email = admin.email WHERE user.email = '$email'";
            $h = $koneksi->query($admin);
            $b = $h->fetch_assoc();
            if ($b['id_admin'] === null){
                $stmt1 = $koneksi->prepare("INSERT INTO admin(nama, usia, gender, no_Hp, email) VALUES 
                (?,?,?,?,?);");
                $stmt1->bind_param("sisss", $nama, $usia, $gender, $no_Hp, $email);
                $stmt1->execute();
                $stmt1->close();
            }
            $koneksi->close();
            header("Location: ../templates/admin.php");
            exit();
        } else if ($baris['status'] === 'kurir'){
            $stmt = $koneksi->prepare("UPDATE kurir SET 
            id_kurir = ?, nama = ?, usia = ?, gender = ?, no_Hp = ?, email = ? WHERE id_kurir = ?;");
            $stmt->bind_param("ssissss", $id, $nama, $usia, $gender, $no_Hp, $email, $id);
            $stmt->execute();
            $stmt->close();
            $kurir = "SELECT kurir.id_kurir FROM kurir RIGHT JOIN user ON user.email = kurir.email WHERE user.email = '$email'";
            $h = $koneksi->query($kurir);
            $b = $h->fetch_assoc();
            if ($b['id_kurir'] === null){
                $stmt1 = $koneksi->prepare("INSERT INTO kurir(nama, usia, gender, no_Hp, email) VALUES 
                (?,?,?,?,?);");
                $stmt1->bind_param("sisss", $nama, $usia, $gender, $no_Hp, $email);
                $stmt1->execute();
                $stmt1->close();
            }
            $koneksi->close();
            header("Location: ../templates/kurir.php");
            exit();
        } else if ($baris['status'] === 'customer'){
            $alamat = $_POST['alamat'];
            $stmt = $koneksi->prepare("UPDATE customer SET 
            id_customer = ?, nama = ?, usia = ?, gender = ?, no_Hp = ?, email = ?, alamat = ? WHERE id_customer = ?;");
            $stmt->bind_param("ssisssss", $id, $nama, $usia, $gender, $no_Hp, $email, $alamat, $id);
            $stmt->execute();
            $stmt->close();
            $customer = "SELECT customer.id_customer FROM customer RIGHT JOIN user ON user.email = customer.email WHERE user.email = '$email'";
            $h = $koneksi->query($customer);
            $b = $h->fetch_assoc();
            if ($b['id_customer'] === null){
                $stmt1 = $koneksi->prepare("INSERT INTO customer(nama, usia, gender, no_Hp, email, alamat) VALUES 
                (?,?,?,?,?,?);");
                $stmt1->bind_param("sissss", $nama, $usia, $gender, $no_Hp, $email, $alamat);
                $stmt1->execute();
                $stmt1->close();
            }
            $koneksi->close();
            header("Location: ../templates/customer.php");
            exit();
        }
        
    }
    header("Location: ../templates/login.php");
    exit();
?>
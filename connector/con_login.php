<?php
    include "con_log_db.php";
    if (isset($_POST['email']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        if(empty($email)){
            header("Location: ../templates/login.php?error=Email is Required");
            exit();
        } else if (empty($password)) {
            header("Location: ../templates/login.php?error=Password is Required");
            exit();
        } else {
            $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password';";
            $result = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);

                print_r($row);
                if ($row['email'] === $email && $row['password'] === $password && $row['status'] === 'customer'){
                    header("Location: ../templates/paketcust.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    exit();
                } else if ($row['email'] === $email && $row['password'] === $password && $row['status'] === 'admin'){
                    header("Location: ../templates/user.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    exit();
                } else if ($row['email'] === $email && $row['password'] === $password && $row['status'] === 'kurir'){
                    header("Location: ../templates/kuriredit.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    exit();
                } else {
                    header("Location: ../templates/login.php?error=Incorrect Email or Password");
                    exit();
                }
            } else {
                header("Location: ../templates/login.php?error=Incorrect Email or Password");
                exit();
            }
        }
    } else {
        header("Location: ../templates/login.php");
        exit();
    }
?>
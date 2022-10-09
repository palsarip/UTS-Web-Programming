<?php
    require_once("db.php");

    // Data from Form
    $username = $_POST['Username'];
    $Nama     = $_POST['Nama_lengkap'];
    $password = $_POST['Password'];
    $gender   = $_POST['Gender'];
    $alamat   = $_POST['Alamat'];
    $Nomortel = $_POST['Nomor_tel'];
    $email    = $_POST['Email'];

    // Encrypt the Password
    $en_pass = password_hash($password, PASSWORD_BCRYPT);

    // SQL Query
    $sql = "INSERT INTO user (Username, Nama_lengkap, Password, Gender, Alamat, Nomor_tel, Email) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Execute Query
    $result = $db->prepare($sql);
    $result->execute([$username, $nama, $en_pass, $gender, $alamat, $Nomortel, $email]);

    header("Location: login.php");
?>
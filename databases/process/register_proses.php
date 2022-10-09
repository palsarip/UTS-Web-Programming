<?php
    require_once("../db.php");

    // Data from Form
    $first_name = $_POST['First_Name'];
    $last_name = $_POST['Last_Name'];
    $username = $_POST['Username'];
    $email    = $_POST['Email'];
    $password = $_POST['Password'];

    // Encrypt the Password
    $en_pass = password_hash($password, PASSWORD_BCRYPT);

    // SQL Query
    $sql = "INSERT INTO user (First_Name, Last_Name, Username, Email, Password) VALUES (?, ?, ?, ?, ?)";

    // Execute Query
    $result = $db->prepare($sql);
    $result->execute([$first_name, $last_name, $username, $email, $en_pass]);

    header("Location: login.php");
?>
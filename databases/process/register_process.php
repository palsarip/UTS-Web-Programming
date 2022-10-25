<?php
    require_once("../db.php");

    // Data from Form
    $first_name = $_POST['First_Name'];
    $last_name = $_POST['Last_Name'];
    $username = $_POST['Username'];
    $email    = $_POST['Email'];
    $user_key = $_POST['User_Key'];
    $password = $_POST['Password'];
    $role = 'User';

    // Encrypt the Password
    $en_pass = password_hash($password, PASSWORD_BCRYPT);

    // SQL Query
    $sql = "INSERT INTO user (First_Name, Last_Name, Username, Email, User_Key,Password, Role) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Execute Query
    $result = $db->prepare($sql);
    $result->execute([$first_name, $last_name, $username, $email, $user_key, $en_pass, $role]);

    header("Location: ../../login.php");
?>
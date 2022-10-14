<?php
    session_start();
    require_once("../db.php");

    // Data from Form
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Check if user exists
    $sql = "SELECT * FROM user WHERE Username = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row){
        echo "User not found";
    } else {
        // Check if password is correct
        if(!password_verify($password, $row['Password'])){
            echo "Wrong password";
        } elseif($row['Status'] == "Banned" || $row['Status'] == "Temporary"){
            echo "User is banned";
        } else {
            echo "Login success";
            $_SESSION['ID_User'] = $row['ID_User'];
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['Role'] = $row['Role'];
            $_SESSION['Picture'] = $row['Picture'];

            header("Location: ../../index.php");
        }

    }
?>
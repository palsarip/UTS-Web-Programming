<?php
    session_start();
    require_once("db.php");

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
        echo "USERNAME ada di database<br/>";
        echo "Password yang diinput di form login: " . $password;
        echo "<br/> Password yang tersimpan di database: " . $row['Password'];
        if(!password_verify($password, $row['Password'])){
            echo "Wrong password";
        } else {
            // Login Success, set SESSION DATA
            $_SESSION['ID_User'] = $row['ID'];
            $_SESSION['Username'] = $row['Username'];
            header("Location: index.php");
        }
    }
?>
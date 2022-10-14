<?php
    require_once("../db.php");

    $email = $_POST['Email'];
    $user_key = $_POST['User_Key'];
    $password = $_POST['Password'];

    $en_pass = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM user WHERE Email = ? AND User_Key = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email, $user_key]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row){
        echo "Wrong Email or Favourite thing";
    } else {
            
        $sql2 = "UPDATE user SET Password = ? WHERE Email = ? AND User_Key = ?";
    
        $stmt2 = $db->prepare($sql2);
        $data2 = [$en_pass ,$email, $user_key];
        $stmt2->execute($data2);
        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        header("Location: ../../login.php");
    }
?>
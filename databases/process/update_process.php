<?php
    session_start();
    require_once("../db.php");

    if(!isset($_SESSION['User_ID']) && !isset($_SESSION['Username'])){
        header("Location: ../../profile.php?user=" . $_SESSION['Username']);
    }else{
        $first_name = $_POST['First_Name'];
        $last_name = $_POST['Last_Name'];
        $email = $_POST['Email'];

        $sql = "UPDATE user 
                SET First_Name = ?, Last_Name = ?, Email = ? 
                WHERE Username = ?";
        $result = $db->prepare($sql);
        $result->execute([$first_name, $last_name, $email, $_SESSION['Username']]);
        
        header("Location: ../../profile.php?user=" . $_SESSION['Username']);
    }
?>
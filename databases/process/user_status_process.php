<?php
    session_start();
    require_once("../db.php");

    if(!isset($_SESSION['User_ID']) && !isset($_SESSION['Username'])){
        header("Location: ../../admin.php");
    }else{
        $id = $_GET['id'];

        $status = $_POST['Status'];

        $sql = "UPDATE user 
                SET Status = ?
                WHERE ID_User = ?";

        $stmt = $db->prepare($sql);
        $data = [$status, $id];
        $stmt->execute($data);

        header("Location: ../../admin.php");
    }
?>
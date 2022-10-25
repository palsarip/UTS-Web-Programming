<?php
    session_start();
    require_once("../db.php");

    if(!isset($_SESSION['ID_User']) && !isset($_SESSION['Username'])){
        header("Location: ../../index.php");
    }else{
        $id = $_GET['id'];
    
        $sql = "DELETE FROM post WHERE ID_Post = ?";
    
        $stmt = $db->prepare($sql);
        $data = [$id];
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        header("location: ../../admin.php");
    }
?>
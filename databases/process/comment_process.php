<?php 
    session_start();
    require_once("../db.php");

    $comment = $_POST["Comment"];
    $postId = $_POST["post_id"];
    $username = $_SESSION["Username"];

    $sql = "INSERT INTO `comments` VALUES (?, ?, ?, ?, ?)";

    // Execute Query
    $result = $db->prepare($sql);
    try {
        $result->execute([NULL, $comment, date('Y-m-d H:i:s'), $postId, $username]);
    } catch (Exception $e) {
        echo $e;
    }
    
    header("Location: ../../index.php");
?>
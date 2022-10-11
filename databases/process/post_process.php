<?php
    session_start();
    require_once("../db.php");

    // Data from Form
    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $category = $_POST['Category'];
    $created_by = $_SESSION['Username'];

    // SQL Query
    // $sql = "INSERT INTO post (Title, Description, Likes, Author, Category, Created_At) VALUES (?, ?, ?, ?, ?, ?)";
    $sql = "INSERT INTO post (Title, Description, Category, Created_By) VALUES (?, ?, ?, ?)";

    // Execute Query
    $result = $db->prepare($sql);
    // $result->execute([$title, $description, $likes, $author, $category, $created_at]);
    $result->execute([$title, $description, $category, $created_by]);

    header("Location: ../../index.php");
?>
<?php
    session_start();
    require_once("../db.php");

    // Data from Form
    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $category = $_POST['Category'];
    $creator_username = $_SESSION['Username'];
    $creator_id = $_SESSION['ID_User'];

    // SQL Query
    // $sql = "INSERT INTO post (Title, Description, Likes, Author, Category, Created_At) VALUES (?, ?, ?, ?, ?, ?)";
    $sql = "INSERT INTO post (Title, Description, Category, Creator_ID, Creator_Username) VALUES (?, ?, ?, ?, ?)";

    $sql2 = "INSERT INTO category (ID_Post, Category) VALUES (?, ?)";

    // Execute Query
    $result = $db->prepare($sql);
    $result2 = $db->prepare($sql2);
    // $result->execute([$title, $description, $likes, $author, $category, $created_at]);
    $result->execute([$title, $description, $category, $creator_id, $creator_username]);
    $result2->execute([$db->lastInsertId(), $category]);

    header("Location: ../../index.php");
?>
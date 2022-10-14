<?php
    session_start();
    require_once("../db.php");

    if (!isset($_SESSION['User_ID']) && !isset($_SESSION['Username'])) {
        header("Location: ../../profile.php?id=" . $_SESSION['ID_User']);
    } else {
        $first_name = $_POST['First_Name'];
        $last_name = $_POST['Last_Name'];
        $email = $_POST['Email'];

        if ($_FILES['Picture']['name'] != NULL && $_FILES['Picture']['tmp_name'] != NULL) {
            // Then Pic is exist (updated)
            $picture = $_FILES['Picture']['name'];
            $filename = $_FILES['Picture']['name'];
            $tmp = $_FILES['Picture']['tmp_name'];

            $sql = "UPDATE user 
                    SET First_Name = ?, Last_Name = ?, Email = ?, Picture = ?, Filename = ? 
                    WHERE ID_User = ?";

            $stmt = $db->prepare($sql);
            $data = [$first_name, $last_name, $email, $picture, $filename,  $_SESSION['ID_User']];
            $stmt->execute($data);

            move_uploaded_file($tmp, "../../uploads/profile/" . $filename);

            $_SESSION['Picture'] = $picture;
        } else {
            // Pic is not updated
            $sql = "UPDATE user 
                    SET First_Name = ?, Last_Name = ?, Email = ? 
                    WHERE ID_User = ?";

            $stmt = $db->prepare($sql);
            $data = [$first_name, $last_name, $email, $_SESSION['ID_User']];
            $stmt->execute($data);
        }

        header("Location: ../../profile.php?id=" . $_SESSION['ID_User']);
    }
?>
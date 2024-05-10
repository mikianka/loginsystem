<?php

include ('../conn/conn.php');

$updateUserID = $_POST['tbl_user_id'];
$updateFirstName = $_POST['first_name'];
$updateLastName = $_POST['last_name'];
$updateContactNumber = $_POST['contact_number'];
$updateEmail = $_POST['email'];
$updateUsername = $_POST['username'];
$updatePassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

try {
    $stmt = $conn->prepare("SELECT `first_name`, `last_name` FROM `tbl_user` WHERE `tbl_user_id` = :userID");
    $stmt->bindParam(':userID', $updateUserID, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $conn->beginTransaction();

        $updateStmt = $conn->prepare("UPDATE `tbl_user` SET `first_name` = :first_name, `last_name` = :last_name, `contact_number` = :contact_number, `email` = :email, `username` = :username, `password` = :password WHERE `tbl_user_id` = :userID");
        $updateStmt->bindParam(':first_name', $updateFirstName, PDO::PARAM_STR);
        $updateStmt->bindParam(':last_name', $updateLastName, PDO::PARAM_STR);
        $updateStmt->bindParam(':contact_number', $updateContactNumber, PDO::PARAM_INT);
        $updateStmt->bindParam(':email', $updateEmail, PDO::PARAM_STR);
        $updateStmt->bindParam(':username', $updateUsername, PDO::PARAM_STR);
        $updateStmt->bindParam(':password', $updatePassword, PDO::PARAM_STR);
        $updateStmt->bindParam(':userID', $updateUserID, PDO::PARAM_INT);
        $updateStmt->execute();

        $conn->commit();

        echo "<script>alert('Updated Successfully'); window.location.href = 'http://localhost/LOGINSYSTEM/endpoint/home.php';</script>";
    } else {
        echo "<script>alert('User Not Found'); window.location.href = 'http://localhost/LOGINSYSTEM/endpoint/index.php';</script>";
    }
} catch (PDOException $e) {
    echo "Error: ". $e->getMessage();
}

?>
<?php
@include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user-id']; 
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        header("Location: admin-dashboard.php?action=set-password&status=Passwords do not match&type=danger#set-password");
        exit;
    }

    // Update the password in the database
    $updateQuery = "UPDATE user SET password = '$new_password' WHERE id = $user_id";
    if ($conn->query($updateQuery) === TRUE) {
        header("Location: admin-dashboard.php?action=set-password&status=Password updated successfully&type=success#set-password");
    } else {
        header("Location: admin-dashboard.php?action=set-password&status=Error updating password: " . $conn->error . "&type=danger#set-password");
    }
    exit;
}
?>

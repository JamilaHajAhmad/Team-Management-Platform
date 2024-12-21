<?php
@include 'dbconfig.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user-id']; 
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $sql = "SELECT * FROM user WHERE id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) 
    {
        header("Location: admin-dashboard.php?action=set-password&status=User not found&type=danger#set-password");
        exit;
    }
    else 
    {
        if ($new_password !== $confirm_password) 
        {
            header("Location: admin-dashboard.php?action=set-password&status=Passwords do not match&type=danger#set-password");
            exit;
        }
        $hash = password_hash($new_password, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE user SET password = '$hash' WHERE id = $user_id";
        if ($conn->query($updateQuery) === TRUE) 
        {
            header("Location: admin-dashboard.php?action=set-password&status=Password updated successfully&type=success#set-password");
            exit;
        } 
        else 
        {
            header("Location: admin-dashboard.php?action=set-password&status=Error updating password: " . $conn->error . "&type=danger#set-password");
            exit;
        }
    }
}
?>

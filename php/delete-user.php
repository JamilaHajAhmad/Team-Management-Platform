<?php
@include 'dbconfig.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user-id'];
    $sql = "SELECT * FROM user WHERE id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) 
    {
        header("Location: admin-dashboard.php?action=delete&status=User not found&type=danger#delete-user");
        exit;
    }
    $deleteQuery = "DELETE FROM user WHERE id = $user_id";
    if ($conn->query($deleteQuery) === TRUE) 
    {
        header("Location: admin-dashboard.php?action=delete&status=User deleted successfully&type=success#delete-user");
        exit;
    } 
    else 
    {
        header("Location: admin-dashboard.php?action=delete&status=Error deleting user: " . $conn->error . "&type=danger#delete-user");
        exit;
    }
    exit;
} 
else 
{
    header("Location: admin-dashboard.php?action=delete&status=Invalid user ID&type=danger#delete-user");
    exit;
}
?>



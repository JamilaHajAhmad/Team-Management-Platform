<?php
@include 'dbconfig.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user-id']; 
    $deleteQuery = "DELETE FROM user WHERE id = $user_id";
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: admin-dashboard.php");
    } else {
        header("Location: admin-dashboard.php");
    }
    exit;
} else {
    header("Location: admin-dashboard.php");
    exit;
}
@include 'view-users.php'
?>

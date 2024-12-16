<?php
@include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $update = []; // Array to hold dynamic SQL update
    $img_url = ''; // Placeholder for photo updates

    // Check each field and add to the update array if provided
    if (!empty($_POST['name'])) {
        $name = test_input($_POST['name']);
        $update[] = "name = '$name'";
    }

    if (!empty($_POST['email'])) {
        $email = test_input($_POST['email']);
        $update[] = "email = '$email'";
    }

    if (!empty($_POST['user_type'])) {
        $user_type = test_input($_POST['user_type']);
        $update[] = "user_type = '$user_type'";
    }

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
        $update[] = "password = '$password'";
    }

    if (isset($_FILES['photo'])) {
        $img_url = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$_FILES['photo']['name']);
        $update[] = "img_url = '$img_url'";
    }

    // Build the SQL update query dynamically
    if (!empty($update)) {
        $updateQuery = "UPDATE user SET " . implode(", ", $update) . " WHERE id = $user_id";

        // Execute the query
        if ($conn->query($updateQuery) === TRUE) {
            header("Location: admin-dashboard.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Error updating user: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>No fields to update.</div>";
    }
}
@include 'view-users.php';
?>


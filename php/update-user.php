<?php
@include 'dbconfig.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $update = [];  
    $sql = "SELECT * FROM user WHERE id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows == 0)
    {
        header("Location: admin-dashboard.php?action=update&status=User not found&type=danger#update-user");
        exit;
    }
    else 
    {
        if (!empty($_POST['name'])) {
            $name = test_input($_POST['name']);
            $update[] = "name = '$name'";
        }
        elseif (!empty($_POST['email'])) {
            $email = test_input($_POST['email']);
            $update[] = "email = '$email'";
        }
        elseif (!empty($_POST['user_type'])) {
            $user_type = $_POST['user_type'];
            $update[] = "user_type = '$user_type'";
        }
        elseif (!empty($_POST['password'])) {
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $update[] = "password = '$hash'";
        }
        elseif (!empty($_FILES['photo']['name'])) {
            if (!validateImgExt($_FILES['photo']['name'])) {
                header("Location: admin-dashboard.php?action=update&status=Invalid image file&type=danger#update-user");
                exit;
            }
            $img_url = $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$_FILES['photo']['name']);
        }
        if (!empty($update)) {
            $updateQuery = "UPDATE user SET " . implode(", ", $update) . " WHERE id = $user_id";
            if ($conn->query($updateQuery) === TRUE) {
                header("Location: admin-dashboard.php?action=update&status=User updated successfully&type=success#update-user");
                exit;
            } 
            else 
            {
                header("Location: admin-dashboard.php?action=update&status=Error updating user: " . $conn->error . "&type=danger#update-user");
                exit;
            }
        }
        else 
        {
            header("Location: admin-dashboard.php?action=update&status=No fields to update&type=danger#update-user");
            exit;
        }
    }
}
?>


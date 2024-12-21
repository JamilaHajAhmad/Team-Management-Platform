<?php
@include 'dbconfig.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
        if(validateImgExt($_FILES['photo']['name']))
        {
            $img_url = $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$_FILES['photo']['name']);
        }
        else 
        {
            header("Location: admin-dashboard.php?action=add&status=Invalid image format&type=danger#add-user");
            exit;
        }
    } 
    $selectQuery = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($selectQuery);
    if ($result && $result->num_rows > 0)
    {
        header("Location: admin-dashboard.php?action=add&status=Email already exists&type=danger#add-user");
        exit;
    }
    else
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO user (name, email, password, user_type, img_url) 
                        VALUES ('$name', '$email', '$hash', '$user_type', '$img_url')";
        if ($conn->query($insertQuery) === TRUE)
        {  
            header("Location: admin-dashboard.php?action=add&status=User added successfully&type=success#add-user");
            exit;
        }
        else 
        {
            header("Location: admin-dashboard.php?action=add&status=Something went wrong!!! " . $conn->error . "&type=danger#add-user");
            exit; 
        }
    }
?>
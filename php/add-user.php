<?php
@include 'dbconfig.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
        $img_url = $_FILES['photo']['name'];
                
        move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$_FILES['photo']['name']);
    }
                
                // Check if the email already exists
                $selectQuery = "SELECT * FROM user WHERE email = '$email'";
                $result = $conn->query($selectQuery);
            
                if ($result && $result->num_rows > 0) {
                    header("Location: admin-dashboard.php");
                }
                else
                {
                    // Insert the user into the database
                    $insertQuery = "INSERT INTO user (name, email, password, user_type, img_url) 
                                    VALUES ('$name', '$email', '$password', '$user_type', '$img_url')";
                    if ($conn->query($insertQuery) === TRUE) {  
                        header("Location: admin-dashboard.php");
                    } else {
                        header("Location: admin-dashboard.php");  
                    }
                }

@include 'view-users.php';
?>
<?php
$exists=false;
$showAlert = false;  
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    @include 'dbconfig.php';

    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['confirm-password'];
    $user_type = $_POST['account-type'];
    $img_url = $_FILES['photo']['name'];

    move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$_FILES['photo']['name']);

    $selectQuery = "SELECT * FROM user WHERE email = '$email'"; 
    $result = $conn -> query($selectQuery); 
    
    $num = mysqli_num_rows($result);  
    if($num == 0) { 
        if(($password == $cpassword) && $exists==false)
        { 
            $insertQuery = "INSERT INTO user(name, email, password, user_type, img_url)
            VALUES('$name','$email','$password','$user_type', '$img_url')";
            $result = mysqli_query($conn, $insertQuery); 
            if ($result) 
            { 
                echo ' <div class="alert alert-success  
                alert-dismissible fade show" role="alert"
                style="position:absolute;right:0px;width:fit-content;"> 
                <strong>Success!</strong> Your account is  
                now created and you can login.  
                <button type="button" class="close"
                data-dismiss="alert" aria-label="Close">  
                <span aria-hidden="true">×</span>  
                </button>  
                </div> ';   
            } 
        }  
        else
        {  
            $showError = "Passwords do not match";  
        }       
    } 
    if($num>0) { 
        $exists='email already exist!';  
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewHub</title>
    <link rel="icon" href="../images/CrewHub-logo.png">
    <link rel="stylesheet" href="../css/sign-up.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@400;500;600&display=swap');
    </style>   
</head>
<body>
<?php 
    if($showError) { 
        echo ' <div class="alert alert-danger  
            alert-dismissible fade show" role="alert"
            style="position:absolute;right:0px;width:fit-content;">  
            <strong>Error!</strong> '. $showError.'
            <button type="button" class="close" 
            data-dismiss="alert aria-label="Close"> 
            <span aria-hidden="true">×</span>  
            </button>  
            </div> ';  
    } 
    if($exists) { 
        echo ' <div class="alert alert-danger  
            alert-dismissible fade show" role="alert"
            style="position:absolute;right:0px;width:fit-content;"> 
            <strong>Error!</strong> '. $exists.'
            <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close">  
            <span aria-hidden="true">×</span>  
            </button> 
            </div> ';  
    } 
?> 
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="./log-in.php">Log in</a></li>
            </ul>
        </nav>
        <img src="../images/CrewHub-logo.png" alt="CrewHub Logo" class="logo">
    </header>
    <main>
        <h2 style="font-family: 'Playfair Display', serif;">Join us Today!</h2>
        <section class="sign-up-form">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <label for="profile-picture">Upload Profile Picture</label>
                <input type="file" id="profile-picture" name="photo" style="border: none;">
                <label>Account Type</label>
                <div>
                    <input type="radio" name="account-type" value="Normal" checked>Normal User
                    <input type="radio" name="account-type" value="Admin">Admin
                </div>
                <input type="submit" value="Create Account">
            </form>
            <p>Already have an account? <a href="log-in.php">Log in</a></p>
        </section>
    </main>
</body>
</html>
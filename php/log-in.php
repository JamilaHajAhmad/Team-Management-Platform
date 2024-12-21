<?php
@include 'dbconfig.php';
$showError = false;  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST['email']);
    $password = $_POST['password'];
    $selectQuery = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($selectQuery);
    if ($result && $result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        $stored_password = $row['password']; 
        $user_type = $row['user_type'];
        $user_name = $row['name'];
        $img_url = $row['img_url'];
        if (password_verify($password, $stored_password)) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['name'] = $user_name;
            $_SESSION['img_url'] = $img_url;
            if ($user_type === 'Admin')
            {
                header("Location: admin-dashboard.php");
            } 
            else 
            {
                header("Location: user-dashboard.php"); 
            }
            exit;
        }
        else
        {
            $showError = "Invalid password. Please try again!!!";
        }
    } 
    else 
    {
        $showError = "No account found with this email!!!";
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
    <link rel="stylesheet" href="../css/log-in.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@400;500;600&display=swap');
    </style>
</head>
<body>
<?php if ($showError): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert"
            style="position:absolute;right:0px;width:fit-content;"> 
            <strong>Error!</strong> <?php echo htmlspecialchars($showError); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <?php endif; ?>
    <header>
        <nav>
            <ul>
                <li><a class="link" href="../index.php">Home</a></li>
                <li><a class="link" href="sign-up.php">Sign up</a></li>
            </ul>
        </nav>
        <img src="../images/CrewHub-logo.png" alt="CrewHub Logo" class="logo">
    </header>
    <main>
        <h2 style="font-family: 'Playfair Display', serif;">Let’s Make Today Amazing!</h2>
        <section class="log-in-form" style="top: 75%;">
            <form action="" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Log in">
            </form>
            <p>Don't have an account? <a href="./sign-up.php">Sign up</a></p>
        </section>
    </main>
</body>
</html>
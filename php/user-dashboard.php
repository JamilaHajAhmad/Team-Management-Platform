<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewHub</title>
    <link rel="icon" href="../images/dashboard-logo.png">
    <link rel="stylesheet" href="../css/user-dashboard.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@400;500;600&display=swap');
    </style>
</head>
<body>
    <header>
        <div class="header-right">
            <div class="user-photo" onclick="toggleLogoutMenu()">
                <img src="../uploads/<?php echo $_SESSION['img_url'] ?>" alt="User Photo" class="user-img">
            </div>
            <div class="logout-menu" id="logoutMenu">
                <a href="../index.php">Log Out</a>
            </div>
        </div>
        <div class="header-left">
            <img src="../images/dashboard-logo.png" alt="CrewHub Logo" class="logo" title="CrewHub">
            <h3>CrewHub</h3>
        </div>
    </header>
    <main class="content">
        <h1>User Profile</h1>
        <section class="user-profile">
            <div class="user-details">
                <h2><?php echo $_SESSION['name'] ?></h2>
                <p><span>Email:</span> <?php echo $_SESSION['email'] ?></p>
                <p><span>Role:</span> <?php echo $_SESSION['user_type'] ?> User</p>
            </div>
            <div class="profile-picture">
                <img src="../uploads/<?php echo $_SESSION['img_url'] ?>" alt="User Profile Picture" class="user-img">
            </div>
        </section>
    </main>
    <script>
        function toggleLogoutMenu() {
            var menu = document.getElementById('logoutMenu');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }
    </script>
</body>
</html>
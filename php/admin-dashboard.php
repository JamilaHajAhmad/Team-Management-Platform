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
    <link rel="stylesheet" href="../css/admin-dashboard.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@400;500;600&display=swap');
    </style>
</head>
<body>
    <header>
        <div class="header-right">
            <div class="user-photo" onclick="toggleLogoutMenu()" style="left:550px;">
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
    <div class="dashboard-container">
        <aside class="sidebar">
            <ul style="font-family: 'Playfair Display', serif;">
                <li><a href="#view-users" onclick="showSection('view-users')">View Users</a></li>
                <li><a href="#add-user" onclick="showSection('add-user')">Add User</a></li>
                <li><a href="#update-user" onclick="showSection('update-user')">Update User</a></li>
                <li><a href="#delete-user" onclick="showSection('delete-user')">Delete User</a></li>
                <li><a href="#set-password" onclick="showSection('set-password')">Set Password</a></li>
            </ul>
        </aside>
        <main class="content">
            <section id="view-users" class="section active">
                <h2 style="font-family: 'Playfair Display', serif;">View Users</h2>
                <?php @include 'view-users.php'; ?>
            </section>
            <section id="add-user" class="section">
                <h2 style="font-family: 'Playfair Display', serif;">Add User</h2>
                <form action="add-user.php" method="post" enctype="multipart/form-data">
                    <label for="username">Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="role">Role:</label>
                    <select id="user_type" name="user_type">
                        <option value="Admin">Admin</option>
                        <option value="Normal">Normal User</option>
                    </select>
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="profile-picture">Profile Photo</label>
                    <input type="file" name="photo" id="profile-picture" style="border:none">
                    
                    <input type="submit" value="Add User">
                </form>
                <img src="../images/addUser.gif" alt="Add User">
            </section>
            <section id="update-user" class="section">
                <h2 style="font-family: 'Playfair Display', serif;">Update User</h2>
                <form action="update-user.php" method="post" enctype="multipart/form-data">
                    <label for="update-user-id">User ID:</label>
                    <input type="number" id="update-user-id" name="user_id" required>
                    <label for="update-field">Choose what to update:</label>
                    <select id="update-field" onchange="showUpdateField()">
                        <option value="" selected disabled>Select an option</option>
                        <option value="name">Name</option>
                        <option value="email">Email</option>
                        <option value="user_type">Role</option>
                        <option value="password">Password</option>
                        <option value="photo">Profile Photo</option>
                    </select>
                    <div id="update-fields">
                    <!-- Name Update -->
                        <div class="update-section" id="update-name" style="display: none;">
                            <label for="new-name">New Name:</label>
                            <input type="text" id="new-name" name="name" placeholder="Enter new name">
                        </div>
                    <!-- Email Update -->
                        <div class="update-section" id="update-email" style="display: none;">
                            <label for="new-email">New Email:</label>
                            <input type="email" id="new-email" name="email" placeholder="Enter new email">
                        </div>
                    <!-- Role Update -->
                        <div class="update-section" id="update-user_type" style="display: none;">
                            <label for="new-role">New Role:</label>
                            <select id="new-role" name="user_type">
                                <option value="" selected disabled>Select an option</option>
                                <option value="Admin">Admin</option>
                                <option value="Normal">User</option>
                            </select>
                        </div>
                    <!-- Password Update -->
                        <div class="update-section" id="update-password" style="display: none;">
                            <label for="new-password">New Password:</label>
                            <input type="password" id="new-password" name="password" placeholder="Enter new password">
                        </div>
                    <!-- Profile Photo Update -->
                        <div class="update-section" id="update-photo" style="display: none;">
                            <label for="new-photo">New Profile Photo:</label>
                            <input type="file" name="photo" id="new-photo" style="border:none">
                        </div>
                    </div>
                    <input type="submit" value="Update User">
                </form>
                <img src="../images/updateUser.gif" alt="Update User">
            </section>
            <section id="delete-user" class="section">
                <h2 style="font-family: 'Playfair Display', serif;">Delete User</h2>
                <form action="delete-user.php" method="post">
                    <label for="user-id">User ID:</label>
                    <input type="number" id="user-id" name="user-id" required>
                    
                    <input type="submit" value="Delete User">
                </form>
                <img src="../images/deleteUser.gif" alt="Delete User">
            </section>
            <section id="set-password" class="section">
                <h2 style="font-family: 'Playfair Display', serif;">Set Password</h2>
                <form action="set-password.php" method="post">
                    <label for="user-id">User ID:</label>
                    <input type="number" id="user-id" name="user-id" required>
                    
                    <label for="password">New Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm_password" required>
                    
                    <input type="submit" value="Set Password">
                </form>
                <img src="../images/setPassword.gif" alt="Set Password">
            </section>
        </main>
    </div>

    <script>
        // Function to handle section visibility
        function showSection(id) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(id).classList.add('active');
        }

        function toggleLogoutMenu() {
            var menu = document.getElementById('logoutMenu');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }

        function showUpdateField() {
    const selectedField = document.getElementById('update-field').value;

    // Hide all update sections
    document.querySelectorAll('.update-section').forEach(section => {
        section.style.display = 'none';
    });

    // Show the selected update section
    if (selectedField) {
        document.getElementById(`update-${selectedField}`).style.display = 'block';
    }
}
    </script>
</body>
</html>

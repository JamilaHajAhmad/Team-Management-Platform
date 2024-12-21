<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewHub</title>
    <link rel="icon" href="../images//CrewHub-logo.png">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@400;500;600&display=swap');
        #team img {
            border: 4px solid #007bff;
            transition: transform 0.3s ease;
        }
        #team img:hover {
            transform: scale(1.1);
        }
        h1 {
            font-family: 'Arima', sans-serif;
        }
        h2 {
            font-family: 'Poppins', sans-serif;
        }
        h4 {
            font-family: 'Oswald', sans-serif;
        }
        p {
            font-family: 'Roboto', sans-serif;
        }
        .blockquote {  
            font-style: italic; 
            color: #555; 
        }
        .blockquote-footer {
            font-size: 0.9rem;
            color: white;
        }
        div span {
            color: #007bff;
            font-weight: 700;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white text-center py-4 shadow">
        <h1>About Us</h1>
        <blockquote class="blockquote">
            <p class="mb-0">"Alone we can do so little, together we can do so much."</p>
            <footer class="blockquote-footer">Helen Keller</footer>
        </blockquote>
        <a href="../index.php" class="btn btn-light mt-3">Back to Home</a>
    </header>
    <main class="container my-5">
        <section id="mission" class="mb-5">
            <h2 class="text-center">Our Mission</h2>
            <p class="text-center">To create a seamless platform for team management, empowering collaboration and efficiency.</p>
        </section>
        <section id="vision" class="mb-5">
            <h2 class="text-center">Our Vision</h2>
            <p class="text-center">To be the leading platform that revolutionizes teamwork through innovation and simplicity.</p>
        </section>
        <section id="team" class="mb-5">
            <h2 class="text-center">Meet Our Team</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="../images/member1.png" alt="Team Member" class="rounded-circle mb-2" style="width: 150px; height: 150px;">
                    <h4>Jamila HajAhmad</h4>
                    <p>Founder & CEO</p>
                    <div class="social-links">
                        <span class="mr-2">
                            <i class="fab fa-x-twitter"></i>
                        </span>
                        <span class="mr-2">
                            <i class="fab fa-linkedin"></i>
                        </span>
                        <span class="mr-2">
                            <i class="fab fa-instagram"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="../images/member2.png" alt="Team Member" class="rounded-circle mb-2" style="width: 150px; height: 150px;">
                    <h4>Rama Anbosi</h4>
                    <p>Data Analyst</p>
                    <div class="social-links">
                        <span class="mr-2">
                            <i class="fab fa-x-twitter"></i>
                        </span>
                        <span class="mr-2">
                            <i class="fab fa-linkedin"></i>
                        </span>
                        <span class="mr-2">
                            <i class="fab fa-kaggle"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="../images/member3.png" alt="Team Member" class="rounded-circle mb-2" style="width: 150px; height: 150px;">
                    <h4>Raya Yahya</h4>
                    <p>Software Engineer</p>
                    <div class="social-links">
                        <span class="mr-2">
                            <i class="fab fa-x-twitter"></i>
                        </span>
                        <span class="mr-2">
                            <i class="fab fa-linkedin"></i>
                        </span>
                        <span class="mr-2">
                            <i class="fab fa-github"></i>
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact" class="mb-5">
            <h2 class="text-center">Contact Us</h2>
            <p class="text-center">Have questions or feedback? Reach out to us!</p>
            <p class="text-center">
                <strong>Email:</strong> <a href="#">support@CrewHub.com</a><br>
                <strong>Phone:</strong> +1 234 567 890
            </p>
        </section>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 | <span style="color:#007bff;">CrewHub</span>. All Rights Reserved.</p>
    </footer>
</body>
</html>

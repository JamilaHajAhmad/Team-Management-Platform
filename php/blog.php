<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewHub</title>
    <link rel="icon" href="../images/CrewHub-logo.png">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@400;500;600&display=swap');
        #blog {
            transition: transform 0.3s ease;
        }
        #blog img {
            border: 1px solid #007bff;
        }
        #blog:hover {
            transform: scale(1.1);
        }
        h1 {
            font-family: 'Arima', sans-serif;
        }
        h5 {
            font-family: 'Oswald', sans-serif;
        }
        p,a {
            font-family: 'Roboto', sans-serif;
        }
        span {
            color: #007bff;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>Our Blog</h1>
        <p>Your daily dose of inspiration, ideas, and insights for building exceptional teams</p>
        <a href="../index.php" class="btn btn-light mt-3">Back to Home</a>
    </header>
    <main class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4" id="blog">
                    <img src="../images/blog1.png" class="card-img-top" alt="Blog Image" style="height: 201px;">
                    <div class="card-body">
                        <h5 class="card-title">Boosting Team Productivity</h5>
                        <p class="card-text">Discover proven strategies to enhance team efficiency and collaboration.</p>
                        <a href="https://www.mwi.org/team-building-improve-productivity/?gad_source=1&gclid=CjwKCAiA65m7BhAwEiwAAgu4JFpeDxP2eMrvyvwCExoU64yMK-e7gwC7PwKFdcV_nSoK-4a-_wt-9xoCAyoQAvD_BwE" target="_blank" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4" id="blog">
                    <img src="../images/blog2.jpg" class="card-img-top" alt="Blog Image" style="height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">The Power of Communication</h5>
                        <p class="card-text">Learn how effective communication can transform your team dynamics.</p>
                        <a href="https://www.tkjleadership.com/articles/the-power-of-communication" target="_blank" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4" id="blog">
                    <img src="../images/blog3.png" class="card-img-top" alt="Blog Image" style="height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Tools for Seamless Collaboration</h5>
                        <p class="card-text">Explore the best tools and techniques to streamline teamwork.</p>
                        <a href="https://www.bulb.digital/blog/the-6-collaboration-tools-we-use-everyday-that-make-us-better" target="_blank" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-white text-center py-3" style="position: absolute; bottom: -60px; width: 100%;">
        <p>&copy; 2024 | <span style="color:#007bff;">CrewHub</span>. All Rights Reserved.</p>
    </footer>
</body>
</html>

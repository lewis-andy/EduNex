
<?php
// Get the buffered content and assign it to $content
$pageContent = ob_get_clean();

// Include the layout
include('layout.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTex home</title>
    <!-- Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Animation CSS link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <!-- js library for animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    <!-- Custom CSS for centering -->
    <style>
        .center {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="center">
                <h2 style="color: #565554">Our Programs</h2>
                <h6>Our comprehensive programming language training proposal offers immersive learning experiences tailored to diverse skill levels. From foundational concepts to advanced techniques, participants gain practical skills in languages like Python, JavaScript, and Java, preparing them for success in today's dynamic tech landscape</h6>

            </div>
        </div>
    </div>
</div>


<section class="features">
    <div class="feature-container">
        <img src="img/network-switch-with-cables.jpg" alt="Flexbox Feature">
        <h2>Computer networks</h2>
        <p>Design, implement, and manage efficient communication systems for seamless connectivity.</p>
    </div>
    <div class="feature-container">
        <img src="img/close-up-image-programer-working-his-desk-office.jpg" alt="Flexbox Feature">
        <h2>Web Development</h2>
        <p>Comprehensive program equipping learners with skills for modern web development.</p>
    </div>
    <div class="feature-container">
        <img src="img/html-css-collage-concept-with-hacker.jpg" alt="Flexbox Feature">
        <h2>CyberSecurity</h2>
        <p>Protecting digital systems from threats through specialized training programs.</p>
    </div>
</section>

<!--service section -->

<section class="team_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2 style="font-size:50px; color: #3f3f3f ">
                our services
            </h2>

        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 mx-auto ">
                <div class="box">
                    <div class="img-box">
                        <img src="img/img_3.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Certification.
                        </h5>
                        <h6 class="">
                            Offering certificates or badges upon completion of the training program, which can be used to demonstrate proficiency to employers or educational institutions.
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mx-auto ">
                <div class="box">
                    <div class="img-box">
                        <img src="img/img_1.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Curriculum development
                        </h5>
                        <h6 class="">
                            Designing a structured curriculum covering various aspects of the programming language, including syntax, data types, control flow, functions, libraries, frameworks, and best practices.
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mx-auto ">
                <div class="box">
                    <div class="img-box">
                        <img src="img/img.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Projects and ssignment
                        </h5>
                        <h6 class="">
                            Assigning real-world projects or coding assignments to allow students to apply their knowledge and build practical experience
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <a href="">
                View All
            </a>
        </div>
    </div>
</section>
<?php
// Get the buffered content and assign it to $content
$pageContent = ob_get_clean();

// Include the layout
include('footer.php');

?>
<!-- eend service section -->

<script src="css/main.js"></script>
</body>
</html>





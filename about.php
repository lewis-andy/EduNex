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
    <title>Error</title>
    <style>

        <?php include "css/about.css"?>
    </style>
</head>

<body>


<!-- about section -->

<section class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 px-0">
                <div class="img_container">
                    <div class="img-box">
                        <img src="img/student.webp" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-0">
                <div class="detail-box">
                    <div class="heading_container ">
                        <h2>
                            Who Are We?
                        </h2>
                    </div>
                    <p>
                        We are a leading provider of programming language training, dedicated to empowering individuals with the
                        skills and knowledge needed to succeed in the dynamic field of technology. With a deep passion for
                        education and a commitment to excellence, we strive to make learning programming languages accessible,
                        engaging, and effective for learners of all backgrounds and skill levels.
                    </p>
                    <p>Our team consists of experienced educators, industry professionals, and passionate technologists who are deeply
                        invested in helping others unlock their full potential in the world of coding. We believe that everyone
                        should have the opportunity to learn and excel in programming, regardless of their prior experience
                        or academic background.
                    </p>
                    <p>
                        At the heart of our approach is a focus on practical, hands-on learning experiences. We understand that mastering a
                        programming language requires more than just memorizing syntax – it requires applying concepts in
                        real-world scenarios, solving problems, and building projects from scratch. That's why our courses
                        are designed to be interactive and engaging, with a strong emphasis on project-based learning.
                    </p>
                    <p>
                        We offer a diverse range of programming language training programs, covering popular languages such as Python,
                        Java, JavaScript, C++, and more. Whether you're a complete beginner looking to take your first
                        steps into the world of coding or an experienced developer seeking to expand your skill set,
                        we have courses tailored to meet your needs.
                    </p>
                    <p>
                        Our instructors are not only experts in their respective fields but also passionate educators who are dedicated
                        to helping you succeed. They provide personalized guidance, constructive feedback, and mentorship every
                        step of the way, ensuring that you have the support you need to reach your goals.
                    </p>
                    <div class="btn-box">
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- end about section -->


<?php
// Get the buffered content and assign it to $content
$pageContent = ob_get_clean();

// Include the layout
include('footer.php');

?>
</body>
</html>
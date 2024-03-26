<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="stylesheet" href="css/index.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        <?php include "css/index.css" ?>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <div class="nav-wrapper">
        <div class="grad-bar"></div>
        <nav class="navbar">
            EduNEx

            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav no-search">
                <li class="nav-item"><a href="index.php">Home</a></li>
                <li class="nav-item"><a href="about.php">About</a></li>
                <li class="nav-item"><a href="CRUD/edit.php">Data</a></li>
<!--                <li class="nav-item"><a href="#"></a></li>-->
                <li class="nav-item"><a href="contact.php">Contact Us</a></li>
                <i class="fas fa-search" id="search-icon"></i>
                <input class="search-input" type="text" placeholder="Search..">
            </ul>
        </nav>
    </div>
    <section class="headline">
        <h1>EduNEx Training Program</h1>
        <p>Where Dreams Are Transformed To reality!</p>
    </section>
</div>

<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="footer-col">-->
<!--                <h4>Ticketsphere</h4>-->
<!--                <ul>-->
<!--                    <li><a href="Aboutus.html">About Us</a></li>-->
<!--                    <li><a href="#">Bus routes</a></li>-->
<!--                    <li><a href="#"></a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="footer-col">-->
<!--                <h4>Get Help</h4>-->
<!--                <ul>-->
<!--                    <li><a href="#">FAQ'S</a></li>-->
<!--                    <li><a href="#">Payment Options</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="footer-col">-->
<!--                <h4>Online Services</h4>-->
<!--                <ul>-->
<!--                    <li><a href="#">Make a booking</a></li>-->
<!--                    <li><a href="#">Bus Hire</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="footer-col">-->
<!--                <h4>follow us</h4>-->
<!--                <div class="social-links">-->
<!--                    <a href=""><ion-icon name="logo-facebook"></ion-icon></a>-->
<!--                    <a href=""><ion-icon name="logo-instagram"></ion-icon></a>-->
<!--                    <a href=""><ion-icon name="logo-twitter"></ion-icon></a>-->
<!--                    <a href=""><ion-icon name="logo-linkedin"></ion-icon></a>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="copyright">-->
<!--            <p>&copy; 2024 Ticketsphere. All rights reserved.</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->
<!---->
<!--<!-- =========ion icons========= -->-->
<!--<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>-->
<!--<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>-->

    <!-- This is where the content of individual pages will be inserted -->
    <?php echo $pageContent; ?>


</body>
</html>

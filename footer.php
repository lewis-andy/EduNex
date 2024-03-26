<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTex home</title>
<style>

    html, body {
        height: 100%;
        margin: 0;
    }

    /* Style the wrapper with flexbox to push the footer to the bottom */
    body {
        display: flex;
        flex-direction: column;
    }

    /* Resetting default margin and padding for all elements */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Styling the footer container */
    .footer {
        background-color: #565554; /* Set the background color */
        color: #fff; /* Set the text color */
        padding: 30px 0; /* Add some padding for better spacing */
        margin-top: auto;
        font-family: 'Ubuntu', sans-serif;
    }

    /* Styling the container within the footer */
    .container {
        max-width: 1200px; /* Set a maximum width for the container */
        margin: 0 auto; /* Center the container on the page */
        flex: 1;
    }

    /* Styling the rows within the container */
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    /* Styling individual footer columns */
    .footer-col {
        width: 25%; /* Each column takes 25% of the container width */
    }

    /* Styling heading within footer columns */
    .footer-col h4 {
        color: #ff6a00; /* Set the heading text color */
        margin-bottom: 15px; /* Add some space below the heading */
    }

    /* Styling the unordered list within footer columns */
    .footer-col ul {
        list-style: none;
        padding: 0;
    }

    /* Styling the list items within footer columns */
    .footer-col li {
        margin-bottom: 10px;
    }

    /* Styling links within footer columns */
    .footer-col a {
        text-decoration: none;
        color: #bbb; /* Set link color */
        transition: color 0.3s ease; /* Add a smooth color transition on hover */
    }

    /* Change link color on hover */
    .footer-col a:hover {
        color: #fff; /* Change link color to white on hover */
    }

    /* Styling social links within the footer */
    .social-links a {
        color: #bbb; /* Set social link color */
        margin-right: 10px; /* Add some space between social links */
    }

    /* Change social link color on hover */
    .social-links a:hover {
        color: #fff; /* Change social link color to white on hover */
    }
    @media (max-width: 767px) {
        .footer-col {
            width: 50%; /* Each column takes 50% of the container width */
            margin-bottom: 30px; /* Add some space between columns */
        }
    }
    .footer-col ul li a{
        font-size: 16px;
        text-transform: capitalize;
        color: #d0c3c3;
        text-decoration: none;
        font-weight: 500;
        display: block;
        transition: all 0.3s ease;
    }
    .footer-col ul li a:hover{
        color: #a18b7b;
        padding-left: 8px;
    }
    .footer-col h4{
        font-size: 18px;
        color: #ff6a00;
        text-transform: capitalize;
        margin-bottom: 15px;
        position: relative;
        font-weight: 500;
    }
    .footer-col h4::before{
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        background-color: #ff6a00;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
    }
    .footer-col ul li:not(:last-child) {
        margin-bottom: 10px;
    }
    /* ... Your existing CSS ... */

    /* Styling the copyright section */
    .copyright {
        text-align: center; /* Center-align the text */
        margin-top: 20px; /* Add some space above the copyright text */
    }

    /* Styling the copyright text */
    .copyright p {
        font-size: 14px; /* Set the font size */
        color: #bbb; /* Set the text color */
    }

</style>

</head>
<body>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>EduNex</h4>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="CRUD/edit.php">database</a></li>
                    <li><a href="contact.php"></a>contact us</li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Get Help</h4>
                <ul>
                    <li><a href="#">FAQ'S</a></li>
                    <li><a href="#">Payment Options</a></li>
                    <li><a href="#" >courses</li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Online Services</h4>
                <ul>
                    <li><a href="#">online admission</a></li>
                    <li><a href="#">Admission letters</a></li>
                    <li><a href="#">Online classes</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href=""><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href=""><ion-icon name="logo-linkedin"></ion-icon></a>

                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 MEHAKPREET SINGH. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- =========ion icons========= -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>


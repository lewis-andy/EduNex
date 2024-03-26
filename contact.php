
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

        <?php include "css/contact.css"?>
    </style>
</head>

<body>

<!-- contact section -->
<section class="contact_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Get In <span>Touch</span></h2>
        </div>
        <div class="row">
            <div class="col-md-6 px-0">
                <div class="form_container">
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" class="form-control" placeholder="Your Name" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" placeholder="Phone Number" />
                            </div>
                            <div class="form-group col-lg-6">
                                <select name="" id="" class="form-control wide">
                                    <option value="">Select Service</option>
                                    <option value="">Service 1</option>
                                    <option value="">Service 2</option>
                                    <option value="">Service 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="email" class="form-control" placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" class="message-box form-control" placeholder="Message" />
                            </div>
                        </div>
                        <div class="btn_box">
                            <button>
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 px-0">
                <div class="map_container">
                    <div class="map">
                        <div id="googleMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387137.1886989129!2d-74.25986469321734!3d40.69714942270535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1644193246942!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact section -->
</body>
</html>
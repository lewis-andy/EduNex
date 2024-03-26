# EduNex
 "EduNex is a robust PHP-based platform designed for an educational institutions to seamlessly manage courses, resources, and student interactions.

## Prerequisites

Before you begin, ensure you have the following installed on your local machine:

- Web server software (e.g., Apache, Nginx)
- PHP (7.x or higher)
- MySQL (or any other relational database)
- Web browser (e.g., Chrome, Firefox, Safari)
- Code editor (e.g., Visual Studio Code, php storm by jetbrains(recommended))

## Getting Started

- Follow these steps to create a MySQL database for the EduNEx System using XAMPP:

1. Install XAMPP: If you haven't already installed XAMPP, download it from the official website (https://www.apachefriends.org/index.html) and follow the installation instructions.

2. Start XAMPP Control Panel: Launch the XAMPP Control Panel and start the Apache and MySQL services.

3. Access phpMyAdmin: Open your web browser and navigate to http://localhost/phpmyadmin.

4. Log in to phpMyAdmin: Enter your MySQL username and password (default username is root and leave the password field empty if you haven't set any).

5. Create a New Database:

- Click on the "Databases" tab in phpMyAdmin.

- Enter a name for your database in the "Create database" field, e.g., `edunex`.

- Click the "Create" button to create the new database.

6. Create a Table:

- Navigate to the newly created database (carsystemdb).
-  Click on the "SQL" tab.

-  in the program folder you will find an sql script run it to create the table, it contains my dummy data:

## Setting up a database configuration file:

- update your configuration file to loo like this:

```php
<?php
// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server name if it's different
$username = "root"; //change this to your username if you have one
$password = ""; //change this to your password if you have one
$database = "edutex";//change this to your preffered database name of your choice.

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```
- Save the file and ensure it is included in your PHP scripts that require database connectivity.
#### 

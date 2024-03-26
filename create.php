<?php
// Include database connection
include 'config.php';

// Check for errors in the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if(isset($_POST['std_name'], $_POST['gender'], $_POST['dob'], $_POST['email'], $_POST['phone_number'], $_POST['fees'])) {
    // Get form data
    $std_name = $_POST['std_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $fees = $_POST['fees'];

    // Prepare the SQL statement to prevent SQL injection
    $insert_student_sql = "INSERT INTO students (std_name, gender, dob, email, phone_number, fees) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters for student insertion
    $stmt = $conn->prepare($insert_student_sql);
    $stmt->bind_param("sssssi", $std_name, $gender, $dob, $email, $phone_number, $fees);

    // Execute the statement for inserting student
    if ($stmt->execute()) {
        // Redirect back to the appropriate page after successful data insertion
        header("Location: CRUD/edit.php");
        exit();
    } else {
        echo "Error inserting record: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Form data is not set";
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
</head>
<body>
<h2>Add New Student</h2>
<form method="post" action="create.php">
    <label for="std_name">Student Name:</label><br>
    <input type="text" id="std_name" name="std_name" required><br>

    <label for="gender">Gender:</label><br>
    <select id="gender" name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select><br>

    <label for="dob">Date of Birth:</label><br>
    <input type="date" id="dob" name="dob" required><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="phone_number">Phone Number:</label><br>
    <input type="text" id="phone_number" name="phone_number" required><br>

    <label for="fees">Fees paid:</label><br>
    <input type="number" id="fees" name="fees" required><br>



    <input type="submit" value="Submit">
</form>
<a href="create_teacher.php">Add teacher</a>
<a href="create_course.php">Add course</a>
<br>
<a href="CRUD/edit.php">view</a>
</body>
</html>


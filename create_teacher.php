<?php
// Include database connection
include 'config.php';

// Check if form data is set
if(isset($_POST['teacher_name'], $_POST['email'], $_POST['phone_number'])) {
    // Get form data
    $teacher_name = $_POST['teacher_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Insert data into teachers table
    $sql = "INSERT INTO teachers (teacher_name, email, phone_number) 
            VALUES ('$teacher_name', '$email', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "New teacher added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form data is not complete";
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Teacher</title>
</head>
<body>
<h2>Add New Teacher</h2>
<form method="post" action="create_teacher.php">
    <label for="teacher_name">Teacher Name:</label><br>
    <input type="text" id="teacher_name" name="teacher_name" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="phone_number">Phone Number:</label><br>
    <input type="text" id="phone_number" name="phone_number" required><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
<a href="create_course.php">cousre</a>
<a href="create.php">back home</a>

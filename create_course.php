<?php
// Include database connection
include 'config.php';

// Check if form data is set
if(isset($_POST['course_name'], $_POST['description'], $_POST['teacher_id'])) {
    // Get form data
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];
    $teacher_id = $_POST['teacher_id'];

    // Check if the provided teacher_id exists in the teachers table
    $check_teacher_sql = "SELECT * FROM teachers WHERE teacher_id = $teacher_id";
    $result = $conn->query($check_teacher_sql);
    if ($result->num_rows > 0) {
        // Insert data into courses table
        $sql = "INSERT INTO courses (course_name, description, teacher_id) 
                VALUES ('$course_name', '$description', '$teacher_id')";
        if ($conn->query($sql) === TRUE) {
            echo "New course added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Teacher with ID $teacher_id does not exist";
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
    <title>Add New Course</title>
</head>
<body>
    <h2>Add New Course</h2>
    <form method="post" action="create_course.php">
        <label for="course_name">Course Name:</label><br>
        <input type="text" id="course_name" name="course_name" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="teacher_id">Teacher ID:</label><br>
        <input type="text" id="teacher_id" name="teacher_id" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<a href="create.php">back home</a>
<?php
// Include database connection
include 'config.php';

// Debugging - Display form data
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Check if form data is set
if(isset($_POST['std_name'], $_POST['gender'], $_POST['dob'], $_POST['email'], $_POST['phone_number'], $_POST['fees'], $_POST['course_id'])) {
    // Get form data
    $std_name = $_POST['std_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $fees = $_POST['fees'];
    $course_id = $_POST['course_id']; // Newly added course_id

    // Prepare the SQL statement to prevent SQL injection
    $insert_student_sql = "INSERT INTO students (std_name, gender, dob, email, phone_number, fees) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters for student insertion
    $stmt = $conn->prepare($insert_student_sql);
    $stmt->bind_param("sssssi", $std_name, $gender, $dob, $email, $phone_number, $fees);

    // Execute the statement for inserting student
    if ($stmt->execute()) {
        // Insert enrollment data after successfully adding student
        $student_id = $stmt->insert_id; // Get the ID of the newly inserted student

        // Prepare the SQL statement for fetching courses
        $sql = "SELECT id, course_name FROM courses";

        // Execute the statement to fetch courses
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            // Populate dropdown menu with course options
            if ($result->num_rows > 0) {
                echo '<select id="course" name="course" required>';
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['course_name'] . "</option>";
                }
                echo '</select><br>';
            } else {
                echo "No courses found";
            }
        } else {
            echo "Error: " . $conn->error;
        }

        // Close result set
        $result->close();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statements
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
</body>
</html>


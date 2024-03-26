<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
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
    <h2>Add New Course</h2>
    <form method="post" action="create_course.php">
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" class="form-control" id="course_name" name="course_name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="teacher_id">Teacher ID:</label>
            <input type="text" class="form-control" id="teacher_id" name="teacher_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="row mt-3">
        <div class="col-md-4">
            <a href="create_teacher.php" class="btn btn-success btn-block">Add New Teacher</a>
        </div>
        <div class="col-md-4">
            <a href="CRUD/edit.php" class="btn btn-info btn-block">Back Home</a>
        </div>
        <div class="col-md-4">
            <!-- Add third button here -->
            <a href="CRUD/course_update.php" class="btn btn-warning btn-block">View Course</a>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

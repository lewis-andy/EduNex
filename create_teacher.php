<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Teacher</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
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
    <h2>Add New Teacher</h2>
    <form method="post" action="create_teacher.php">
        <div class="form-group">
            <label for="teacher_name">Teacher Name:</label>
            <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
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
            <a href="CRUD/teachers_update.php" class="btn btn-warning btn-block">View Teacher</a>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

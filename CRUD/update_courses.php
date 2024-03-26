<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Update Course Details</h2>

    <?php
    // Include database connection file
    include_once "../config.php";

    // Check if form data is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        // Get the ID and table name from the URL query string
        $id = isset($_GET["id"]) ? $_GET["id"] : null;
        $table = isset($_GET["table"]) ? $_GET["table"] : null;

        // Check if the ID and table name are set
        if ($id && $table) {
            // Define array to hold field-value pairs for the update query
            $fields = array();

            // Check and add each form field to the fields array
            if (isset($_POST["course_name"])) {
                $fields[] = "course_name='" . $_POST["course_name"] . "'";
            }
            if (isset($_POST["teacher_id"])) {
                $fields[] = "teacher_id=" . $_POST["teacher_id"];
            }
            if (isset($_POST["description"])) {
                $fields[] = "description='" . $_POST["description"] . "'";
            }
            // Add other fields here as needed

            // Construct the UPDATE query
            $updateQuery = "UPDATE $table SET " . implode(", ", $fields) . " WHERE course_id=" . $id;

            // Execute the UPDATE query
            if (mysqli_query($conn, $updateQuery)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "Invalid ID or table name";
        }
    }

    // Retrieve data for the selected course
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $table = "Courses"; // Hardcode the table name since we know it's "Courses"

    if ($id) {
        $sql = "SELECT * FROM $table WHERE course_id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "No data found for the selected course";
        }
    } else {
        echo "ID parameter is missing in the URL";
    }

    // Close database connection
    mysqli_close($conn);
    ?>

    <form method="post" action="update_courses.php?id=<?php echo $id; ?>&table=Courses">
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo isset($row['course_name']) ? $row['course_name'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="teacher_id">Teacher ID:</label>
            <input type="text" class="form-control" id="teacher_id" name="teacher_id" value="<?php echo isset($row['teacher_id']) ? $row['teacher_id'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required><?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>

</div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

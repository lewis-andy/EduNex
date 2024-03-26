<?php
// Include database connection file
include_once "../config.php";

// Initialize $row variable
$row = array();

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $teacher_id = $_GET['id'];

    // Fetch teacher details from the database
    $sql = "SELECT * FROM Teachers WHERE teacher_id = $teacher_id";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully and fetch the row
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<p>No teacher found with ID: $teacher_id</p>";
    }
} else {
    echo "<p>Error: Teacher ID is missing in the URL</p>";
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Get the ID and table name from the URL query string
    $id = $_GET["id"];
    $table = $_GET["table"];

    // Check if the ID and table name are set
    if ($id && $table) {
        // Define array to hold field-value pairs for the update query
        $fields = array();

        // Check and add each form field to the fields array
        if (isset($_POST["teacher_name"])) {
            $fields[] = "teacher_name='" . $_POST["teacher_name"] . "'";
        }
        if (isset($_POST["email"])) {
            $fields[] = "email='" . $_POST["email"] . "'";
        }
        if (isset($_POST["phone_number"])) {
            $fields[] = "phone_number='" . $_POST["phone_number"] . "'";
        }

        // Construct the UPDATE query
        $updateQuery = "UPDATE $table SET " . implode(", ", $fields) . " WHERE teacher_id=" . $id;

        // Execute the UPDATE query
        if (mysqli_query($conn, $updateQuery)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid ID or table name";
    }
} else {
    echo "Form data not submitted";
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Update Teacher Details</h2>
    <form method="post" action="update_teacher.php?id=<?php echo $teacher_id; ?>&table=Teachers">

    <div class="form-group">
            <label for="teacher_name">Teacher Name:</label>
            <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="<?php echo isset($row['teacher_name']) ? $row['teacher_name'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo isset($row['phone_number']) ? $row['phone_number'] : ''; ?>" required>
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

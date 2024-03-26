<?php
// Include database connection file
include_once "config.php";

// Check if both 'id' and 'table' parameters are set in the URL
if (isset($_GET['id']) && isset($_GET['table'])) {
    // Retrieve 'id' and 'table' parameters from the URL
    $id = $_GET['id'];
    $table = $_GET['table'];

    // Ensure that 'id' and 'table' parameters are not empty
    if (!empty($id) && !empty($table)) {
        // Retrieve the record from the database based on ID and table name
        $sql = "SELECT * FROM $table WHERE std_id = $id";
        $result = mysqli_query($conn, $sql);

        // Check if the record exists
        if (mysqli_num_rows($result) > 0) {
            // Fetch the record data
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Error: Record not found";
            exit;
        }
    } else {
        // Handle case where 'id' or 'table' parameter is empty
        echo "Error: ID or table parameter is empty";
        exit;
    }
} else {
    // Handle case where 'id' or 'table' parameter is not set
    echo "Error: ID or table parameter is missing in the URL";
    exit;
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
        if (isset($_POST["std_name"])) {
            $fields[] = "std_name='" . $_POST["std_name"] . "'";
        }
        if (isset($_POST["gender"])) {
            $fields[] = "gender='" . $_POST["gender"] . "'";
        }
        if (isset($_POST["dob"])) {
            $fields[] = "dob='" . $_POST["dob"] . "'";
        }
        if (isset($_POST["email"])) {
            $fields[] = "email='" . $_POST["email"] . "'";
        }
        if (isset($_POST["phone_number"])) {
            $fields[] = "phone_number='" . $_POST["phone_number"] . "'";
        }
        if (isset($_POST["fees"])) {
            $fields[] = "fees=" . $_POST["fees"];
        }

        // Construct the UPDATE query
        $updateQuery = "UPDATE $table SET " . implode(", ", $fields) . " WHERE std_id=" . $id; // Change 'Students_id' to 'std_id'
        echo "Update Query: $updateQuery<br>"; // Debugging line

        // Check if $updateQuery is not empty
        if (!empty($updateQuery)) {
            // Execute the UPDATE query
            if (mysqli_query($conn, $updateQuery)) { // Use the updated query
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "Update query is empty";
        }
    } else {
        echo "Invalid ID or table name";
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateStudents Record</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-5 mb-4 text-center">Update Record</h2>

    <form method="post" action="update.php?id=<?php echo $_GET['id']; ?>&table=<?php echo $_GET['table']; ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="std_name" value="<?php echo $row['std_name'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $row['gender'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $row['phone_number'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="fees">Fees:</label>
            <input type="number" class="form-control" id="fees" name="fees" value="<?php echo $row['fees'] ?? ''; ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Update</button>

    </form>
    <hr>
    <a href="CRUD/edit.php" class="btn btn-success">Back to dashboard</a>
</div>
</body>
</html>

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
        // Construct the SQL query to fetch the record based on ID and table name
        $sql = "SELECT * FROM $table WHERE std_id = $id";

        // Execute the SQL query
        $result = mysqli_query($conn, $sql);


        // Check if the query executed successfully
        if ($result) {
            // Proceed with updating the record
            // Your update logic goes here

            // Example: Output 'id' and 'table' parameters for debugging
            echo "ID: $id, Table: $table";
        } else {
            // Handle case where query execution failed
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Handle case where 'id' or 'table' parameter is empty
        echo "Error: ID or table parameter is empty";
    }
} else {
    // Handle case where 'id' or 'table' parameter is not set
    echo "Error: ID or table parameter is missing in the URL";
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

        /// Construct the UPDATE query
        $updateQuery = "UPDATE $table SET " . implode(", ", $fields) . " WHERE std_id=" . $id;
        echo "Update Query: $updateQuery<br>"; // Debugging line

        // Execute the UPDATE query
        if (mysqli_query($conn, $sql)) {
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
    <title>Update Record</title>
</head>
<body>
<h2>Update Record</h2>

<form method="post" action="update.php?id=<?php echo $_GET['id']; ?>&table=<?php echo $_GET['table']; ?>">
    <label for="gender">Gender:</label><br>
    <input type="text" id="gender" name="gender" value="<?php echo $row['gender'] ?? ''; ?>"><br>

    <label for="dob">Date of Birth:</label><br>
    <input type="date" id="dob" name="dob" value="<?php echo $row['dob'] ?? ''; ?>"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?php echo $row['email'] ?? ''; ?>"><br>

    <label for="phone_number">Phone Number:</label><br>
    <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['phone_number'] ?? ''; ?>"><br>

    <label for="fees">Fees:</label><br>
    <input type="number" id="fees" name="fees" value="<?php echo $row['fees'] ?? ''; ?>"><br>

    <input type="submit" name="submit" value="Update">
</form>
</body>
</html>

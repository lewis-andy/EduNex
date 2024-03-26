
<?php
// Get the buffered content and assign it to $content
$pageContent = ob_get_clean();

// Include the layout
include('../layout.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <a href="../create.php" class="btn btn-primary mb-3">Add a new record</a><hr>
    <?php
    // Include database connection file
    include_once "../config.php";

    // Function to display data from the Students table
    function displayStudentsTable($conn) {
        $sql = "SELECT * FROM Students";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<h2>Students Table</h2>";
            echo "<table class='table'>";
            // Table headers
            echo "<thead class='thead-light'>";
            echo "<tr>";
            while ($fieldinfo = mysqli_fetch_field($result)) {
                echo "<th>" . $fieldinfo->name . "</th>";
            }
            echo "<th>Action</th>"; // Add action column
            echo "</tr>";
            echo "</thead>";
            // Table data
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<td>" . $value . "</td>";
                }
                // CRUD operations
                echo "<td>";
                if (isset($row['std_id'])) {
                    // Encode table name to ensure proper URL formatting
                    $encodedTableName = urlencode("Students");

                    // Generate links to update and delete pages
                    echo "<a href='../update.php?table=$encodedTableName&id=" . $row['std_id'] . "' class='btn btn-primary'>Edit</a> ";
                    echo "<a href='../delete.php?table=$encodedTableName&id=" . $row['std_id'] . "' class='btn btn-danger'>Delete</a>";
                } else {
                    echo "N/A";
                }
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No data available in Students table</p>";
        }
    }

    // Display the Students table and CRUD operations
    displayStudentsTable($conn);

    // Close database connection
    mysqli_close($conn);
    ?>

    <br>
    <a href="teachers_update.php" class="btn btn-primary">View and Update Teachers</a><hr>
    <a href="course_update.php" class="btn btn-warning">View and Update Courses</a><hr>
    <a href="school_data.php" class="btn btn-success">View School Data</a><hr>
    <a href="../index.php" class="btn btn-success">Main Menu</a><hr>
</div>


<?php
// Get the buffered content and assign it to $content
$pageContent = ob_get_clean();

// Include the layout
include('../footer.php');

?>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

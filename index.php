<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <a href="create.php">create a new entry</a><br>
    <a href="create_course.php">create course</a>
</head>
<body>
<?php
// Include database connection file
include_once "config.php";

// Function to display data from a given table
function displayTableData($conn, $tableName, $idColumnName) {
    $sql = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>$tableName Table</h2>";
            echo "<table>";
            // Table headers
            echo "<tr>";
            while ($fieldinfo = mysqli_fetch_field($result)) {
                echo "<th>" . $fieldinfo->name . "</th>";
            }
            echo "<th>Action</th>"; // Add action column
            echo "</tr>";
            // Table data
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<td>" . $value . "</td>";
                }
                // CRUD operations
                echo "<td>";
                if (isset($row[$idColumnName])) {
                    // Encode table name to ensure proper URL formatting
                    $encodedTableName = urlencode($tableName);

                    // Generate links to update and delete pages
                    echo "<a href='update.php?table=$encodedTableName&id=" . $row[$idColumnName] . "'>Edit</a> | ";
                    echo "<a href='delete.php?table=$encodedTableName&id=" . $row[$idColumnName] . "'>Delete</a>";
                } else {
                    echo "N/A";
                }
                echo "</td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No data available in $tableName table</p>";
        }
    } else {
        echo "Error: " . mysqli_error($conn); // Display MySQL error
    }
}

// Display data from each table with respective ID column names
displayTableData($conn, "Students", "std_id");
displayTableData($conn, "Teachers", "teacher_id");
displayTableData($conn, "Courses", "course_id");
displayTableData($conn, "school_data", "id");

// Close database connection
mysqli_close($conn);
?>


</body>
</html>

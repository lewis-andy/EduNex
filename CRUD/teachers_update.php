<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Teachers</title>
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
</head>
<body>
<?php
// Include database connection file
include_once "../config.php";

// Function to display data from the Teachers table
function displayTeachersTable($conn) {
    $sql = "SELECT * FROM Teachers";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h2>Teachers Table</h2>";
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
            echo "<a href='update_teacher.php?id=" . $row['teacher_id'] . "'>Edit</a> | ";
            echo "<a href='delete_teacher.php?id=" . $row['teacher_id'] . "'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No data available in Teachers table</p>";
    }
}

// Display the Teachers table and CRUD operations
displayTeachersTable($conn);

// Close database connection
mysqli_close($conn);
?>
<br>
<br>
<a href="edit.php">Back home</a>
</body>
</html>

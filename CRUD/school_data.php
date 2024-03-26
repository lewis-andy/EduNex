<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View School Data</title>
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

// Function to display data from the school_data table
function displaySchoolDataTable($conn) {
    $sql = "SELECT * FROM school_data";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h2>School Data Table</h2>";
        echo "<table>";
        // Table headers
        echo "<tr>";
        while ($fieldinfo = mysqli_fetch_field($result)) {
            echo "<th>" . $fieldinfo->name . "</th>";
        }
        echo "</tr>";
        // Table data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No data available in School Data table</p>";
    }
}

// Display the School Data table
displaySchoolDataTable($conn);

// Close database connection
mysqli_close($conn);
?>
<a href="edit.php"> back home</a>
</body>
</html>

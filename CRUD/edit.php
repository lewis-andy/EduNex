<?php
// Get the buffered content and assign it to $content
$pageContent = ob_get_clean();

// Include the layout
include('../layout.php');
?>


<?php
// Include database connection file
include_once "../config.php";

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
            echo "</tr>";
            // Table data
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            // Edit and Delete buttons
            echo "<form method='post' action='../update.php'>";
            echo "<input type='hidden' name='table' value='$tableName'>";
            echo "<input type='hidden' name='idColumnName' value='$idColumnName'>";
            echo "<input type='submit' name='edit' value='Edit'>";
            echo "</form>";

            echo "<form method='post' action='../delete.php'>";
            echo "<input type='hidden' name='table' value='$tableName'>";
            echo "<input type='hidden' name='idColumnName' value='$idColumnName'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
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
<a href="../update.php>">update student</a>

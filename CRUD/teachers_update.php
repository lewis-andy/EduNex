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
    <title>View Teachers</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
<div class="container mt-5">
    <?php
    // Include database connection file
    include_once "../config.php";

    // Function to display data from the Teachers table
    function displayTeachersTable($conn) {
        $sql = "SELECT * FROM Teachers";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<h2 class='mb-4'>Our Esteamed Team</h2>";
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
                echo "<a class='btn btn-primary btn-sm mr-2' href='update_teacher.php?id=" . $row['teacher_id'] . "'>Edit</a>";
                echo "<a class='btn btn-danger btn-sm' href='delete_teacher.php?id=" . $row['teacher_id'] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='text-danger'>No data available in Teachers table</p>";
        }
    }

    // Display the Teachers table and CRUD operations
    displayTeachersTable($conn);

    // Close database connection
    mysqli_close($conn);
    ?>
</div>
<br>
<br>
<a href="edit.php" class="btn btn-primary">Back Home</a><br>


<?php
// Get the buffered content and assign it to $content
$pageContent = ob_get_clean();

// Include the layout
include('../footer.php');

?>
</body>
</html>

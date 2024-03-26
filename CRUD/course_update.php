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
    <title>View Courses</title>
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
<div class="container mt-4">
    <?php
    // Include database connection file
    include_once "../config.php";

    // Function to display data from the Courses table
    function displayCoursesTable($conn) {
        $sql = "SELECT * FROM Courses";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<h2>Courses Table</h2>";
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
                echo "<a href='update_courses.php?id=" . $row['course_id'] . "&table=Courses' class='btn btn-primary'>Edit</a> ";
                echo "<a href='delete_course.php?id=" . $row['course_id'] . "&table=Courses' class='btn btn-danger'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No data available in Courses table</p>";
        }
    }

    // Display the Courses table and CRUD operations
    displayCoursesTable($conn);

    // Close database connection
    mysqli_close($conn);
    ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="../create_course.php" class="btn btn-success">Add New Course</a>
        </div>
        <div class="col-md-6 text-right">
            <a href="edit.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

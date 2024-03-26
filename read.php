<?php
include 'config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: error.php");
    exit();
}

$courseID = $_GET['id'];
$sql = "SELECT * FROM Courses WHERE CourseID = '$courseID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: error.php");
    exit();
}

$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
</head>
<body>
<h2>Course Details</h2>
<p>Course Name: <?php echo $row['CourseName']; ?></p>
<p>Course Description: <?php echo $row['CourseDescription']; ?></p>
<p>Teacher ID: <?php echo $row['TeacherID']; ?></p>
<p>Start Date: <?php echo $row['CourseStartDate']; ?></p>
<p>End Date: <?php echo $row['CourseEndDate']; ?></p>
<a href="index.php">Back to Courses</a>
</body>
</html>

<?php
include '../config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: error.php");
    exit();
}

$teacherID = $_GET['id']; // Corrected variable name

// Display confirmation message
echo "<h2>Delete Teacher</h2>";
echo "<p>Are you sure you want to delete this teacher?</p>";
echo "<form method='post' action=''>";
echo "<input type='hidden' name='teacherID' value='$teacherID'>"; // Corrected variable name
echo "<input type='submit' name='delete' value='Delete'>";
echo "<a href='index.php'>Cancel</a>";
echo "</form>";

if (isset($_POST['delete'])) {
    // Delete record from database
    $sql = "DELETE FROM teachers WHERE teacher_id='$teacherID'"; // Corrected table name and column name
    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


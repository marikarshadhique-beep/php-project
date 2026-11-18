
<?php
include "db.php";

$id = $_GET['id'] ?? '';

if (empty($id)) {
    die("Student ID is missing.");
}

$sql = "DELETE FROM student WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: show.php");
        exit;
    } else {
        echo "Student not found.";
    }
} else {
    echo "Delete Failed: " . mysqli_stmt_error($stmt);
}
?>

<?php
include "db.php";
$id = $_GET['id'] ?? '';
$sql = "SELECT * FROM student WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);

if (!$student) {
    echo ("Student not found.");
}
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);
if (!$student) {
    die("Student not found.");
}
if (isset($_POST['update']))
{
    $Username = $_POST['Username'];
    $Fullname = $_POST['Fullname'];
    $Nic = $_POST['Nic'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $Date = $_POST['Registration_date'];
    $Time = $_POST['Registration_time'];

    $sql = "UPDATE student set"
            . " username = ?,"
            . " fullname = ?,"
            . " nic = ?,"
            . " phone = ?,"
            . " email = ?,"
            . " address = ?,"
            . " registration_date = ?,"
            . " registration_time = ?"
            . " WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssi",
        $username,
        $fullname,
        $nic,
        $phone,
        $email,
        $address,
        $date,
        $time,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {

        header("Location: show.php");
        exit;
    } else {
        echo "Update Failed: " . mysqli_stmt_error($stmt);

    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>EDIT STUDENT DETAILS</h2>

    <form method="POST">
        USER NAME:-
        <input type="text" name="username" value="<?php echo htmlspecialchars($student['username']); ?>" required>
        <br><br>

        FULLNAME:-
        <input type="text" name="fullname" value="<?php echo htmlspecialchars($student['fullname']); ?>" required>
        <br><br>

        NIC:-
        <input type="text" name="nic" value="<?php echo  htmlspecialchars($student['nic']); ?>" required>
        <br><br>

        PHONE:-
        <input type="text" name="phone" value="<?php echo htmlspecialchars($student['phone']); ?>" required>
        <br><br>

        EMAIL:-
        <input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>
        <br><br>

        ADDRESS:-
        <textarea name="address" required><?php echo htmlspecialchars($student['address']); ?></textarea>
        <br><br>

         DATE:-
        <input type="date" name="registration_date" value="<?php echo htmlspecialchars($student['registration_date']); ?>" required>
        <br><br>

        TIME:-
        <input type="time" name="registration_time" value="<?php echo htmlspecialchars($student['registration_time']); ?>" required>
        <br><br>

        <button type="submit" name="update">UPDATE</button>

        </form>

        </body>
        </html>


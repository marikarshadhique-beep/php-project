<?php
include "db.php";
$sql = "SELECT * FROM student";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student details</title>
</head>
<body>
    <h2>STUDENT DETAILS</h2>
    <a href="index2.php">ADD STUDENT</a>
    <br><br>
    <table border="1" cellpadding="16">
        <tr>
            <th>ID</th>
            <th>USERNAME</th>
            <th>FULLNAME</th>
            <th>NIC</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
            <th>DATE</th>
            <th>TIME</th>
            <th>EDIT</th>
            <th>DELETE</th>
</tr>

<?php
while ($student = mysqli_fetch_assoc($result)) {
    ?>

    <tr>
        <td><?php echo $student['id']; ?></td>
        <td><?php echo $student['username']; ?></td>
        <td><?php echo $student['fullname']; ?></td>
        <td><?php echo $student['nic']; ?></td>
        <td><?php echo $student['phone']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['address']; ?></td>
        <td><?php echo $student['registration_date']; ?></td>
        <td><?php echo $student['registration_time']; ?></td>
        <td><a href="edit.php?id=<?php echo $student['id'];?>">EDIT</a></td>
        <td><a href="delete.php?id=<?php echo $student['id'];?>">DELETE</a></td>
    </tr>
    <?php
}
?>

    </table>
        
</body>
</html>
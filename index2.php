<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student registration </title>
</head>
<body>
    <h2>STUDENT REGISTRATION </h2>
    <form action="insert.php" method="POST">
        USER NAME:-
        <input type="text" name="username" required>
        <br><br>

        FULLNAME:-
        <input type="text" name="fullname" required>
        <br><br>

        NIC:-
        <input type="text" name="nic" required>
        <br><br>

        PHONE:-
        <input type="text" name="phone" required>
        <br><br>
        EMAIL:-
        <input type="email" name="email" required>


        ADDRESS:-
        <textarea name="address" required></textarea>
        <br><br>

         DATE:-
        <input type="date" name="registration_date" required>
        <br><br>

        TIME:-
        <input type="time" name="registration_time" required>
        <br><br>

        <button type="submit" name="submit">SUBMIT</button>

    </form>
    <br>

    <a href="Show.php">VIEW STUDENTS</a>

</body>
</html>
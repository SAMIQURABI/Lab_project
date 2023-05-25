<?php
$conn = mysqli_connect('localhost', 'root', '', 'sami');

if (!$conn) {
    echo 'Error: ' . mysqli_connect_error();
}

if (isset($_POST['submit'])) {
    $FirstName = $_POST['FirstName'];
    $Email = $_POST['Email'];
    $Gender = $_POST['Gender'];

    $sql = "INSERT INTO students (FirstName, Email, Gender)
            VALUES ('$FirstName', '$Email', '$Gender')";

    if (mysqli_query($conn, $sql)) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>
<body>
    <form action="index.php" method="POST">
        <h1>Student Registration Form</h1>
        <div>
            <label for="FirstName">First Name</label>
            <input type="text" id="FirstName" name="FirstName">
        </div>
        <div>
            <label for="Email">Email</label>
            <input type="text" id="Email" name="Email">
        </div>
        <div>
            <label for="gender">Gender:</label><br>
            <input type="radio" id="male" name="Gender" value="Male" required>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="Gender" value="Female" required>
            <label for="female">Female</label>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
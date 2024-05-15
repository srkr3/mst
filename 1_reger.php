<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

<div class="container">
    <h2>Registration Form</h2>
    <form action="" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="regEmail">Email:</label>
            <input type="email" id="regEmail" name="email" required>
        </div>
        <div>
            <label for="regUsername">Username:</label>
            <input type="text" id="regUsername" name="username" required>
        </div>
        <div>
            <label for="regPassword">Password:</label>
            <input type="password" id="regPassword" name="password" required>
        </div>
        <div>
            <label for="regnumber">Phone Number:</label>
            <input type="text" id="regnumber" name="number" required>
        </div>
        <button type="submit" name="register">Register</button>
    </form>
</div>

<?php
if(isset($_POST['register'])){ 

    $conn = new mysqli("localhost", "root", "", "internal");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO reg_details (username, password, phone_num, name, email) VALUES ('$username', '$password', '$number', '$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

</body>
</html>

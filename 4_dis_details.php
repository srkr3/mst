<!DOCTYPE html>
<html>
<head>
    <title>display details</title>
    <style>
    </style>
</head>
<body>

    <h2>Login</h2>
    <form action="" method="post">
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
        </div>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
        </div>
        <button type="submit" name="login">Login</button>
    </form>


    <?php
    if (isset($_POST['login'])) {
        
        
        $conn = new mysqli("localhost", "root", "", "internal");


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM reg_details WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $username = $row['username'];
            $email = $row['email'];
            $mobile = $row['phone_num'];

            echo '<p>Login successful! Welcome'.$username.'</p>';
            echo '<p>User Details</p>';
            echo '<p>Username:'. $username.'</p>';
            echo '<p>Email:'. $email.'</p>';
            echo '<p>Mobile Number:'. $mobile.'</p>';
        } else {
            echo "<p>Invalid email or password.</p>";
        }

        mysqli_close($conn);
    }
    ?>

</body>
</html>

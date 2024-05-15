<!DOCTYPE html>
<html>
<head>
    <title>display user name</title>
    <style>
    </style>
</head>
<body>

<div class="container">
    <h2>display user name</h2>
    <form action="" method="post">
        <div >
            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div >
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="login">Login</button>
    </form>

    <?php
    if(isset($_POST['login'])) {
        
        $conn = new mysqli("localhost", "root", "", "internal");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM reg_details WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name']; 
            echo '<p class="success">Login successful! Welcome, ' . $name . '.</p>';
        } else {
            echo '<p class="error">Invalid username or password</p>';
        }

        $conn->close();
    }
    ?>
</div>

</body>
</html>

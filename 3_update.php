<!DOCTYPE html>
<html>
<head>
    <title>Update Mobile Number</title>
    <style>
    </style>
</head>
<body>

    <h2>Update Mobile Number</h2>
    <form action="" method="post">
        <div >
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div >
            <label for="newMobile">New Mobile Number:</label>
            <input type="text" id="newMobile" name="newMobile" required>
        </div>
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if(isset($_POST['update'])) {
        
        $conn = new mysqli("localhost", "root", "", "internal");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $username = $_POST['username'];
        $newMobile = $_POST['newMobile'];

        $check_user = "SELECT * FROM reg_details WHERE username='$username'";
        $res_che = $conn->query($check_user);

        if($res_che->num_rows === 1)
        {
            $sql = "UPDATE reg_details SET phone_num='$newMobile' WHERE username='$username'";
            if ($conn->query($sql) === TRUE) {
                echo '<p>Mobile number updated successfully.</p>';
            } else {
                echo '<p>Error updating mobile number: ' . $conn->error . '</p>';
            }
        }
        else {
            echo '<p>user not found </p>';
        }

        $conn->close();
    }
    ?>

</body>
</html>

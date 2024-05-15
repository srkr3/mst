<!DOCTYPE html>
<html>
<head>
    <title>Delete Registration Details</title>
</head>
<body>

    <h2>Delete Registration Details</h2>
    <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        <button type="submit" name="delete">Delete</button>
    </form>

    <?php
    if(isset($_POST['delete'])) {

        $conn = new mysqli("localhost", "root", "", "internal");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $username = $_POST['username'];

        $check_query = "SELECT * FROM reg_details WHERE username='$username'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            $delete_query = "DELETE FROM reg_details WHERE username='$username'";
            if ($conn->query($delete_query) === TRUE) {
                echo '<p class="success">Registration details for username ' . $username . ' deleted successfully.</p>';
            } else {
                echo '<p class="error">Error deleting registration details: ' . $conn->error . '</p>';
            }
        } else {
            echo '<p class="error">User with username ' . $username . ' does not exist.</p>';
        }
        $conn->close();
    }
    ?>

</body>
</html>

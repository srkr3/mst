<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>

    <h2>Upload Image</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit" name="upload">Upload</button>
    </form>

    <?php
    if(isset($_POST['upload'])) {
        
        $conn = new mysqli("localhost", "root", "", "internal");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $image = $_FILES['image']['tmp_name']; 
        $image_data = addslashes(file_get_contents($image)); 

        $sql = "INSERT INTO images (image) VALUES ('$image_data')";
        
        if ($conn->query($sql) === TRUE) {
            echo '<p class="success">Image uploaded successfully.</p>';
        } else {
            echo '<p class="error">Error uploading image: ' . $conn->error . '</p>';
        }

        $conn->close();
    }
    ?>

</body>
</html>

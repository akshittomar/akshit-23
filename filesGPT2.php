<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <h1>File Upload</h1>

    <?php
    if (isset($_POST['upload'])) {
        $file = $_FILES['file'];
        $filename = $file['name'];
        $filetype = $file['type'];
        $filesize = $file['size'];

        // Check if the file type is allowed
        $allowedFormats = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!in_array($filetype, $allowedFormats)) {
            echo '<script>alert("Incorrect file type. Only JPG, JPEG, and PNG files are allowed.");</script>';
        }
        // Check if the file size is less than 20MB (20,000,000 bytes)
        elseif ($filesize > 20000000) {
            echo '<script>alert("File size exceeds 20MB. Please choose a smaller file.");</script>';
        } else {
            $filedata = file_get_contents($file['tmp_name']);

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "files";

            $conn = new mysqli($servername, $username, $password, $dbname);
 
            $sql = "INSERT INTO fff (filename) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $filedata);
            $stmt->execute();
            $stmt->close();

            $conn->close();
            exit();
        }
    }
    ?>

    <form action="http://localhost/akshit-23/filesGPT.php" method="POST" enctype="multipart/form-data">
        <label for="file">Choose a file (JPG, JPEG, PNG only, max 20MB):</label>
        <input type="file" name="file" id="file" accept=".jpg,.jpeg,.png" required>
        <input type="submit" name="upload" value="Upload">
    </form>
</body>
</html>

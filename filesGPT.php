<!DOCTYPE html>
<html>
<head>
    <title>File Upload </title>
</head>
<body>
    <h1>File Upload </h1>

    <?php
    
    if (isset($_POST['upload'])) {
        
        $file = $_FILES['file'];
        
        $filedata = file_get_contents($file['tmp_name']);

        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "files";

        $conn = new mysqli($servername, $username, $password, $dbname);

        
        $sql = "INSERT INTO fff (filename) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $filedata);
        $stmt->execute();
        $stmt->close();

        
        $conn->close();

        
        
        exit();
    }

    
   
    ?>

    <form action="http://localhost/akshit-23/filesGPT.php" method="POST" enctype="multipart/form-data">
        <label for="file">Choose a file:</label>
        <input type="file" name="file" id="file" required>
        <input type="submit" name="upload" value="Upload">
        
    </form>
</body>
</html>

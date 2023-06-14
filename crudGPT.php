<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operations</title>
</head>
<body>
    <h1>CRUD Operations</h1>

    <form action="http://localhost/akshit-23/crudGPT.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required>
        <input type="submit" name="create" value="Create">
        
    </form><hr/>

    <form action="http://localhost/akshit-23/crudGPT.php" method="POST">
        <label for="id">ID:</label>
        <input type="number" name="id" id="id" required>
        <label for="new_name">New Name:</label>
        <input type="text" name="new_name" id="new_name" required>
        <label for="new_age">New Age:</label>
        <input type="number" name="new_age" id="new_age" required>
        <input type="submit" name="update" value="Update">
    </form>

    <form action="http://localhost/akshit-23/crudGPT.php" method="POST">
        <label for="id">ID:</label>
        <input type="number" name="id" id="id" required>
        <input type="submit" name="delete" value="Delete">
    </form>

    <form action="http://localhost/akshit-23/crudGPT.php" method="GET">
        <input type="submit" name="read" value="Read">
    </form>

    <?php
    
    // Check if any of the buttons were clicked 
    if (isset($_POST['create'])) {
        // Create button was clicked
        $name = $_POST['name'];
        $age = $_POST['age'];

        // Perform create operation

        // Connect to MySQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user2";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Insert data into the table
        $sql = "INSERT INTO detail (name, age) VALUES ('$name', '$age')";
        $conn->query($sql); 
        $conn->close();
        exit();
    } elseif (isset($_POST['update'])) {
        // Update button was clicked
        $id = $_POST['id'];
        $newName = $_POST['new_name'];
        $newAge = $_POST['new_age'];

        // Perform update operation

        // Connect to MySQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user2";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Update the record in the table
        $sql = "UPDATE detail SET name='$newName', age='$newAge' WHERE id='$id'";
        $conn->query($sql);

        // Close the database connection
        $conn->close();

        // Redirect back to the index page
        // header("Location: /");
        exit();
    } elseif (isset($_POST['delete'])) {
        // Delete button was clicked
        $id = $_POST['id'];

        // Perform delete operation

        // Connect to MySQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user2";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Delete the record from the table
        $sql = "DELETE FROM detail WHERE id='$id'";
        $conn->query($sql);

        // Close the database connection
        $conn->close();

        // Redirect back to the index page
        // header("Location: /");
        exit();
    } elseif (isset($_GET['read'])) {
        // Read button was clicked

        // Perform read operation

        // Connect to MySQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user2";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Retrieve all records from the table
        $sql = "SELECT * FROM detail";
        $result = $conn->query($sql);

        // Display the records
        if ($result->num_rows > 0) {
            echo "<h2>User Records:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Age: " . $row['age'] . "<br>";
            }
        } else {
            echo "No records found.";
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</body>
</html>

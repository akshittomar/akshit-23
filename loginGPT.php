<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php
    // Define MySQL credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    // Establish a MySQL database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the login form is submitted
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate the login credentials
        $sql = "SELECT * FROM data WHERE uname = '$username' AND pass = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login successful
            echo "Login successful. Welcome, " . $username . "!";
        } else {
            // Invalid login credentials
            echo "Invalid username or password.";
        }
    }

    // Check if the registration form is submitted
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];



        $sql = "SELECT * FROM data WHERE uname = '$username' AND pass = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "A USER ALREADY EXSISTS.";
        }
        else{

        // Insert user data into the database
        $sql = "INSERT INTO data (uname, pass) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful. Welcome, " . $username . "!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    }

    // Close the database connection
    $conn->close();
    ?>

    <h2>Login Form</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" name="login" value="Login">
    </form>

    <h2>Registration Form</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>

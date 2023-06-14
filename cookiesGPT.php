<?php
// Start session
session_start();

// Check if the counter session variable exists, if not, initialize it to 0 
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// Check if the counter cookie exists, if not, initialize it to 0
if (!isset($_COOKIE['counter'])) {
    setcookie('counter', 0, time() + 86400); // Cookie expires in 1 day (86400 seconds)
}

// Increment the counter when the button is clicked
if (isset($_POST['increment'])) {
    $_SESSION['counter']++;
    setcookie('counter', $_COOKIE['counter'] + 1, time() + 86400); // Update the cookie value
}

// Display the session variable
echo 'Session Counter: ' . $_SESSION['counter'] . '<br>';

// Display the cookie variable
echo 'Cookie Counter: ' . $_COOKIE['counter'];
?>

<!-- HTML form with a button to increment the counter -->
<form method="POST">
    <button type="submit" name="increment">Increment Counter</button>
</form>

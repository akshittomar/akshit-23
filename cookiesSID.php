<?php
session_start();
// Check if the session counter variable exists
if (!isset($_SESSION['counter'])) {
$_SESSION['counter'] = 1;
} else {
$_SESSION['counter']++;
}
// Check if the cookie counter variable exists
$cookieCounter = $_COOKIE['counter'] ?? 0; 
// Use 0 as the default value if 'counter' key is not set
setcookie('counter', $cookieCounter + 1, time() + 86400); 
// Update the cookie counter value
// Display the session counter variable
echo "Session Counter: " . $_SESSION['counter'] . "<br>";
// Display the cookie counter variable
echo "Cookie Counter: " . ($cookieCounter + 1) . "<br>";
?>
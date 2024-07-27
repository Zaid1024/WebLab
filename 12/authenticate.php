<?php
// Function to read credentials from file
function getStoredCredentials($filename) {
    $credentials = [];
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($username, $password) = explode(':', $line);
        $credentials[$username] = $password;
    }
    return $credentials;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Read stored credentials
    $storedCredentials = getStoredCredentials("credentials.txt");

    // Validate credentials
    if (isset($storedCredentials[$username]) && $storedCredentials[$username] === $password) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
    }
}
?>


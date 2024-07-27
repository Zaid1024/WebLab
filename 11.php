<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Form</title>
</head>
<body>
    <h2>Enter Information</h2>
    <form method="post" action="">
        <label for="info">Information:</label><br>
        <input type="text" id="info" name="info" required><br><br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $info = $_POST['info'];
        
        // Display the information
        echo "<h3>Submitted Information:</h3>";
        echo "<p>" . htmlspecialchars($info) . "</p>";
        
        // Store the information in a text file
        $file = 'information.txt';
        file_put_contents($file, $info . PHP_EOL, FILE_APPEND);
        
        echo "<p>Information has been stored in the file.</p>";
    }
    ?>
</body>
</html>

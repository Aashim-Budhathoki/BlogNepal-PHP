<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['txtname'];
    $email = $_POST['txtemail'];
    $phone = $_POST['txtphone'];
    $message = $_POST['txtmessage'];

    // Connect to the database
    $con = mysqli_connect("localhost", "root", "", "db_project");

    // Check connection
    if (!$con) {
        $_SESSION['notification'] = "Connection error: " . mysqli_connect_error();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Prepare the SQL statement with placeholders
    $stmt = $con->prepare("INSERT INTO tbl_contact (name, email, phone, message) VALUES (?, ?, ?, ?)");
    
    // Check if the prepare() succeeded
    if (!$stmt) {
        $_SESSION['notification'] = "Prepare failed: " . $con->error;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Bind the form data to the placeholders
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    // Execute the prepared statement
    if ($stmt->execute()) {
        $_SESSION['notification'] = "Thank you for your valuable message";
    } else {
        $_SESSION['notification'] = "Insertion error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();

    // Redirect to the same page to display the notification
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <?php
    if (isset($_SESSION['notification'])) {
        echo '<script>alert("' . $_SESSION['notification'] . '");</script>';
        // Unset the notification after displaying it
        unset($_SESSION['notification']);
    }
    ?>
<!--form method="post" action="">
        <label for="txtname">Name:</label>
        <input type="text" id="txtname" name="txtname" required><br><br>
        <label for="txtemail">Email:</label>
        <input type="email" id="txtemail" name="txtemail" required><br><br>
        <label for="txtphone">Phone:</label>
        <input type="text" id="txtphone" name="txtphone" required><br><br>
        <label for="txtmessage">Message:</label>
        <textarea id="txtmessage" name="txtmessage" required></textarea><br><br>
        <button type="submit">Submit</button>
    </form>-->
    <a href="contact.php" style="color: blue; text-decoration: none; font-weight: bold; font-size: 16px; padding: 5px 10px; background-color: lightgray; border: 1px solid gray; border-radius: 5px;"> Back to Contact us page</a>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

<?php include('header.php'); ?>

<div class="containers">
    <h1>Contact Us</h1><br>
    <p>We would love to respond to your queries and help you succeed.<br> Feel free to get in touch with us.</p>
    <div class="contact-form">
        <form id="form" action="retrieve_contactform.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="txtname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="txtemail" required>

            <label for="phone">Phone no:</label>
            <input type="text" id="phone" name="txtphone" required>

            <label for="message">Message:</label>
            <textarea id="message" name="txtmessage" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>

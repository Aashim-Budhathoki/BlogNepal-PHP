<?php
session_start();

if(isset($_POST['login'])) {
    //including database connection
    require_once "db_connect.php";

    //get username and password from the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    //sql injection
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    //fetch user data from form data
    $sql = "SELECT * FROM users WHERE user_name ='$username'";

    $result = mysqli_query($con, $sql);

    if($row = mysqli_fetch_assoc($result)) {
        //verify password
        $password = md5($password);
        if($password == $row['user_password']) {
            //password is correct
            //setting value in session
            $_SESSION['username'] = $row['user_name'];

            //redirecting to index
            header("Location: index.php");
            exit();
        }
    }

    // If the login fails, display an error message
   
     echo '<script>alert("Sorry, the username or password you entered is incorrect. Please try again.");</script>';
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .log_in {
            width: 450px;
            margin: 50px auto;
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 1, 0.9);
        }

        .log_in label {
            color: #757575;
            position: absolute;
            left: 1.5rem;
            top: 0.75rem;
            transition: 0.3s ease all;
            pointer-events: none;
        }

        .log_in input[type="text"],
        .log_in input[type="password"] {
            width: 100%;
            padding: 10px 10px 10px 1.5rem;
            margin-bottom: 20px;
            border: none;
            border-bottom: 1px solid #ccc;
            font-size: 15px;
            position: relative;
            z-index: 1;
            background: transparent;
            color: #333;
        }

        .log_in input[type="text"]:focus,
        .log_in input[type="password"]:focus {
            outline: none;
            border-bottom: 2px solid hsl(327, 90%, 28%);
        }

        .log_in input[type="text"]:focus ~ label,
        .log_in input[type="password"]:focus ~ label,
        .log_in input[type="text"]:not(:placeholder-shown) ~ label,
        .log_in input[type="password"]:not(:placeholder-shown) ~ label {
            top: -1rem;
            font-size: 12px;
            color: hsl(327, 90%, 28%);
        }

        .log_in button {
            font-size: 1.1rem;
            padding: 8px 0;
            border-radius: 5px;
            outline: none;
            border: none;
            width: 100%;
            background: rgb(125, 125, 235);
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .log_in button:hover {
            background: #07001f;
        }

        .log_in table {
            width: 100%;
            margin-bottom: 20px;
        }

        .log_in table tr td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Login Form</h1>
    <div class="log_in">
        <form action="login_form.php" method="post">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" id="username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
            </table>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>

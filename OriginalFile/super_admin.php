
<?php
session_start();

// Define the hardcoded username and password
$validUsername = "admin";
$validPassword = "password"; // Replace with your actual password

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the provided username and password match the hardcoded values
    if ($username === $validUsername && $password === $validPassword) {
        // Set a session variable to indicate the user is logged in
        $_SESSION['username'] = $username;
        header("Location: user_dashboard.php"); // Redirect to the dashboard or another page upon successful login
        exit();
    } else {
        $error_message = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <style type="text/css">
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
            text-align: center;
        }
    </style>
    <!-- Your HTML head content here -->
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
        <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
    </form>
</body>
</html>

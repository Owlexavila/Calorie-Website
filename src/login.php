<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="lightMode.css" rel="stylesheet"/>
    <title>My FalconPal</title>
</head>

<body>
<div class="banner">
    <img src="MyFalconPalLogo.png" class="center">
</div>

<div class="padding"></div>

<div class="main">
    <h1>Welcome to MyFalconPal</h1>
    <h2>Please Login</h2>

    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" placeholder="Use an afacademy email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter a password" required>

        <div class="wrap">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

<p>Not registered? <a href='registration.php' style="text-decoration: none;">Create an account</a></p>

<?php
// Establishing connection to PostgreSQL
$db = pg_connect("host=localhost dbname=NutritionWarrior user=student password=CompSci364");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $query = "SELECT * FROM Users WHERE email='$email' AND passwords='$password'";
    $result = pg_query($db, $query);
    $count = pg_num_rows($result);

    if ($count == 1) {
        // Redirect to main.php upon successful login
        header('Location: main.php');
        exit(); // Make sure to exit after the redirect
    } else {
        echo "<script>alert('Invalid email or password!')</script>";
    }
}

// Closing connection
pg_close($db);
?>

</body>
</html>


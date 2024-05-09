<!DOCTYPE html>
<html>
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
    <h2>Create Account</h2>

    <form action="registration.php" method="post">
        <label for="first">First Name:</label>
        <input type="text" id="first" name="first" pattern="[a-zA-Z\- ]{1,50}" required />

        <label for="last">Last Name:</label>
        <input type="text" id="last" name="last" pattern="[a-zA-Z\- ]{1,50}" required />

        <label for="email">USAFA Email:</label>
        <input type="email" id="email" name="email" placeholder="Use an afacademy email" pattern="[cC]\d{2}[a-zA-Z]+\.+[a-zA-Z]+@afacademy.af.edu$" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' : ''); if(this.checkValidity()) form.repassword.pattern = this.value;" placeholder="Enter a password" required title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />

        <label for="repassword">Re-type Password:</label>
        <input type="password" id="repassword" name="repassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Re-type password" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required />

        <button type="submit">Register</button>
    </form>
</div>

<p>Already have an account? <a href='login.php' style="text-decoration: none;">Login</a></p>

<?php
// Establishing connection to PostgreSQL
$db = pg_connect("host=localhost dbname=NutritionWarrior user=student password=CompSci364");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Check if passwords match
    if ($password !== $repassword) {
        echo "<p>Passwords do not match.</p>";
    } else {
        // Check if user with the same email already exists
	$check_query = "SELECT * FROM public.\"Users\" WHERE \"email\"='$email'";
        $check_result = pg_query($db, $check_query);
        $count = pg_num_rows($check_result);

        if ($count > 0) {
            echo "<p>User with this email already exists.</p>";
        } else {
            // Insert new user into the database
            $insert_query = "INSERT INTO public.\"Users\" (email, password) VALUES ('$email', '$password')";
            $insert_result = pg_query($db, $insert_query);

            if ($insert_result) {
                echo "<p>Registration successful!</p>";
                header("Location: login.php");
                exit();
            } else {
                echo "<p>Registration failed. Please try again later.</p>";
            }
        }
    }
}

// Closing connection
pg_close($db);
?>
</body>
</html>



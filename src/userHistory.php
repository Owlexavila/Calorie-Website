<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Get the email of the user from session
$userEmail = $_SESSION['email'];

// Initialize variables to hold user data
$totalCalories = "0";
$totalProtein = "0";
$totalCarbohydrates = "0";
$totalFat = "0";
$totalWater = "0";

// Check if there's a delete request and the date is not empty
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteDateInput']) && !empty($_POST['deleteDateInput'])) {
    // Establish connection to your PostgreSQL database
    $db = pg_connect("host=localhost dbname=NutritionWarrior user=student password=CompSci364");

    // Get the deleteDate from POST data
    $deleteDate = $_POST['deleteDateInput'];

    // Delete user history for the selected date
    $query = "DELETE FROM public.\"UserHistory\" WHERE email='$userEmail' AND date='$deleteDate'";
    $result = pg_query($db, $query);

    if ($result) {
        $deleteMessage = "User history for $deleteDate deleted successfully.";
    } else {
        $deleteMessage = "Error deleting user history.";
    }

    // Close database connection
    pg_close($db);
}

// Fetch user values for the selected date
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['historyDate'])) {
    // Establish connection to your PostgreSQL database
    $db = pg_connect("host=localhost dbname=NutritionWarrior user=student password=CompSci364");

    // Get the historyDate from POST data
    $historyDate = $_POST['historyDate'];

    // Query to fetch user values for the selected date
    $query = "SELECT * FROM public.\"UserHistory\" WHERE email='$userEmail' AND date='$historyDate'";
    $result = pg_query($db, $query);

    if ($result) {
        // Check if there are rows returned
        if (pg_num_rows($result) > 0) {
            // Fetch the data and store in variables
            $userData = pg_fetch_assoc($result);
            $totalCalories = $userData['totalcal'];
            $totalProtein = $userData['totalprotein'];
            $totalCarbohydrates = $userData['totalcarb'];
            $totalFat = $userData['totalfat'];
            $totalWater = $userData['totalwater'];
        } else {
            // No data found for the selected date
            $errorMessage = "No data found for the selected date.";
        }
    } else {
        // Handle error if fetching fails
        $errorMessage = "Error fetching user data.";
    }

    // Close database connection
    pg_close($db);
}
?>
 
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="lightMode.css" rel="stylesheet" />
    <title>User History - <?php echo $userEmail; ?></title>
    <style>
        #nutritionDetails {
            display: flex;
            flex-direction: column;
        }

        .nutrition-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .nutrition-item label {
            flex: 1;
        }

        .nutrition-item p {
            margin-left: 10px;
        }
    </style>
</head>

<body class="userHistory">
    <div class="banner">
        <img src="MyFalconPalLogo.png" class="center">
    </div>

    <div class="padding"></div>
    <div class="main">
        <h2>User History</h2>
        <h3>Email: <?php echo $userEmail; ?></h3> <!-- Display user's email -->

        <?php if (isset($deleteMessage)) : ?>
            <p><?php echo $deleteMessage; ?></p>
        <?php endif; ?>

        <?php if (isset($errorMessage)) : ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <form id="historyForm" action="userHistory.php" method="post">
            <label for="historyDate">Select a date:</label>
            <input type="date" id="historyDate" name="historyDate">
            <button type="submit">Show History</button>
        </form>

        <div id="nutritionDetails">
            <div class="nutrition-item">
                <label>Total Calories:</label>
                <p><?php echo isset($totalCalories) ? $totalCalories : ""; ?></p>
            </div>

            <div class="nutrition-item">
                <label>Total Protein:</label>
                <p><?php echo isset($totalProtein) ? $totalProtein : ""; ?> (g)</p>
            </div>

            <div class="nutrition-item">
                <label>Total Carbohydrates:</label>
                <p><?php echo isset($totalCarbohydrates) ? $totalCarbohydrates : ""; ?> (g)</p>
            </div>

            <div class="nutrition-item">
                <label>Total Fat:</label>
                <p><?php echo isset($totalFat) ? $totalFat : ""; ?> (g)</p>
            </div>

            <div class="nutrition-item">
                <label>Water Intake:</label>
                <p><?php echo isset($totalWater) ? $totalWater : ""; ?> (floz)</p>
            </div>
        </div>

        <form id="deleteForm" action="userHistory.php" method="post">
        	<label for="historyDate">Delete a date:</label>
            <input type="date" id="deleteDateInput" name="deleteDateInput">
            <button type="submit">Delete Selected Date</button>
        </form>
    </div>

    <p>
        <a href='login.php' style="text-decoration: none;"> Logout </a>
        <span style="margin-left: 20px; margin-right: 5px;">&nbsp;</span>
        <a href='main.php' style="text-decoration: none;"> Main </a>
    </p>
</body>
</html>



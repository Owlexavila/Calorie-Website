<?php
session_start();
// Establishing connection to PostgreSQL
$db = pg_connect("host=localhost dbname=NutritionWarrior user=student password=CompSci364");

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$date = '2024-05-06';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['curDate'])) {
        $date = $_POST['curDate']; // Capture the submitted date
    } else {
        echo "No date entered."; // Optional: Handle the case where no date is entered
    }
}

$date = pg_escape_string($db, $date); // Escape the date to prevent SQL injection


$breakfast1Name = 'No Meal';
$breakfast1cals = 0;
$breakfast1carbs = 0;
$breakfast1protein = 0;
$breakfast1fat = 0;

$mealType1 = 'breakfast1'; // Define meal type explicitly as a variable for clarity and safety
$breakfast1NameQuery = "SELECT name, totalcal, totalcarb, totalprotein, totalfat FROM public.\"Item\" WHERE date='$date' AND \"mealType\"='$mealType1'";
$breakfast1Result = pg_query($db, $breakfast1NameQuery);
if (pg_num_rows($breakfast1Result) > 0) {
$breakfast1NameArray = pg_fetch_assoc($breakfast1Result);
$breakfast1Name = $breakfast1NameArray['name'];
$breakfast1cals = $breakfast1NameArray['totalcal'];
$breakfast1carbs = $breakfast1NameArray['totalcarb'];
$breakfast1protein = $breakfast1NameArray['totalprotein'];
$breakfast1fat = $breakfast1NameArray['totalfat'];
} else {
echo "<script>alert('No Meals on this date!')</script>";
}

$breakfast2Name = 'No Meal';
$breakfast2cals = 0;
$breakfast2carbs = 0;
$breakfast2protein = 0;
$breakfast2fat = 0;
$mealType2 = 'breakfast2'; // Define meal type explicitly as a variable for clarity and safety
$breakfast2NameQuery = "SELECT name, totalcal, totalcarb, totalprotein, totalfat FROM public.\"Item\" WHERE date='$date' AND \"mealType\"='$mealType2'";

$breakfast2Result = pg_query($db, $breakfast2NameQuery);
if (pg_num_rows($breakfast2Result) > 0) {
$breakfast2NameArray = pg_fetch_assoc($breakfast2Result);
$breakfast2Name = $breakfast2NameArray['name'];
$breakfast2cals = $breakfast2NameArray['totalcal'];
$breakfast2carbs = $breakfast2NameArray['totalcarb'];
$breakfast2protein = $breakfast2NameArray['totalprotein'];
$breakfast2fat = $breakfast2NameArray['totalfat'];
} else {

}

$breakfast3Name = 'No Meal';
$breakfast3cals = 0;
$breakfast3carbs = 0;
$breakfast3protein = 0;
$breakfast3fat = 0;
$mealType3 = 'breakfast3'; // Define meal type explicitly as a variable for clarity and safety
$breakfast3NameQuery = "SELECT name, totalcal, totalcarb, totalprotein, totalfat FROM public.\"Item\" WHERE date='$date' AND \"mealType\"='$mealType3'";

$breakfast3Result = pg_query($db, $breakfast3NameQuery);
if (pg_num_rows($breakfast3Result) > 0) {
$breakfast3NameArray = pg_fetch_assoc($breakfast3Result);
$breakfast3Name = $breakfast3NameArray['name'];
$breakfast3cals = $breakfast3NameArray['totalcal'];
$breakfast3carbs = $breakfast3NameArray['totalcarb'];
$breakfast3protein = $breakfast3NameArray['totalprotein'];
$breakfast3fat = $breakfast3NameArray['totalfat'];
} else {

}

$lunch1Name = 'No Meal';
$lunch1cals = 0;
$lunch1carbs = 0;
$lunch1protein = 0;
$lunch1fat = 0;
$mealType4 = 'lunch1'; // Define meal type explicitly as a variable for clarity and safety
$lunch1NameQuery = "SELECT name, totalcal, totalcarb, totalprotein, totalfat FROM public.\"Item\" WHERE date='$date' AND \"mealType\"='$mealType4'";

$lunch1Result = pg_query($db, $lunch1NameQuery);
if (pg_num_rows($lunch1Result) > 0) {
$lunch1NameArray = pg_fetch_assoc($lunch1Result);
$lunch1Name = $lunch1NameArray['name'];
$lunch1cals = $lunch1NameArray['totalcal'];
$lunch1carbs = $lunch1NameArray['totalcarb'];
$lunch1protein = $lunch1NameArray['totalprotein'];
$lunch1fat = $lunch1NameArray['totalfat'];
} else {

}

$lunch2Name = 'No Meal';
$lunch2cals = 0;
$lunch2carbs = 0;
$lunch2protein = 0;
$lunch2fat = 0;
$mealType5 = 'lunch2'; // Define meal type explicitly as a variable for clarity and safety
$lunch2NameQuery = "SELECT name, totalcal, totalcarb, totalprotein, totalfat FROM public.\"Item\" WHERE date='$date' AND \"mealType\"='$mealType5'";

$lunch2Result = pg_query($db, $lunch2NameQuery);
if (pg_num_rows($lunch2Result) > 0) {
$lunch2NameArray = pg_fetch_assoc($lunch2Result);
$lunch2Name = $lunch2NameArray['name'];
$lunch2cals = $lunch2NameArray['totalcal'];
$lunch2carbs = $lunch2NameArray['totalcarb'];
$lunch2protein = $lunch2NameArray['totalprotein'];
$lunch2fat = $lunch2NameArray['totalfat'];
} else {

}

$lunch3Name = 'No Meal';
$lunch3cals = 0;
$lunch3carbs = 0;
$lunch3protein = 0;
$lunch3fat = 0;
$mealType6 = 'lunch3'; // Define meal type explicitly as a variable for clarity and safety
$lunch3NameQuery = "SELECT name, totalcal, totalcarb, totalprotein, totalfat FROM public.\"Item\" WHERE date='$date' AND \"mealType\"='$mealType6'";

$lunch3Result = pg_query($db, $lunch3NameQuery);
if (pg_num_rows($lunch3Result) > 0) {
$lunch3NameArray = pg_fetch_assoc($lunch3Result);
$lunch3Name = $lunch3NameArray['name'];
$lunch3cals = $lunch3NameArray['totalcal'];
$lunch3carbs = $lunch3NameArray['totalcarb'];
$lunch3protein = $lunch3NameArray['totalprotein'];
$lunch3fat = $lunch3NameArray['totalfat'];
} else {

}

$dinner1Name = 'No Meal';
$dinner1cals = 0;
$dinner1carbs = 0;
$dinner1protein = 0;
$dinner1fat = 0;
$mealType7 = 'dinner1'; // Define meal type explicitly as a variable for clarity and safety
$dinner1NameQuery = "SELECT name, totalcal, totalcarb, totalprotein, totalfat FROM public.\"Item\" WHERE date='$date' AND \"mealType\"='$mealType7'";

$dinner1Result = pg_query($db, $dinner1NameQuery);
if (pg_num_rows($dinner1Result) > 0) {
$dinner1NameArray = pg_fetch_assoc($dinner1Result);
$dinner1Name = $dinner1NameArray['name'];
$dinner1cals = $dinner1NameArray['totalcal'];
$dinner1carbs = $dinner1NameArray['totalcarb'];
$dinner1protein = $dinner1NameArray['totalprotein'];
$dinner1fat = $dinner1NameArray['totalfat'];
} else {

}

$dinner2Name = 'No Meal';
$dinner2cals = 0;
$dinner2carbs = 0;
$dinner2protein = 0;
$dinner2fat = 0;
$mealType8 = 'dinner2'; // Define meal type explicitly as a variable for clarity and safety
$dinner2NameQuery = "SELECT name, totalcal, totalcarb, totalprotein, totalfat FROM public.\"Item\" WHERE date='$date' AND \"mealType\"='$mealType8'";

$dinner2Result = pg_query($db, $dinner2NameQuery);
if (pg_num_rows($dinner2Result) > 0) {
$dinner2NameArray = pg_fetch_assoc($dinner2Result);
$dinner2Name = $dinner2NameArray['name'];
$dinner2cals = $dinner2NameArray['totalcal'];
$dinner2carbs = $dinner2NameArray['totalcarb'];
$dinner2protein = $dinner2NameArray['totalprotein'];
$dinner2fat = $dinner2NameArray['totalfat'];
} else {

}

$dinner3Name = 'No Meal';
$dinner3cals = 0;
$dinner3carbs = 0;
$dinner3protein = 0;
$dinner3fat = 0;
$mealType9 = 'dinner3'; // Define meal type explicitly as a variable for clarity and safety
$dinner3NameQuery = "SELECT name, totalcal, totalcarb, totalprotein, totalfat FROM public.\"Item\" WHERE date='$date' AND \"mealType\"='$mealType9'";

$dinner3Result = pg_query($db, $dinner3NameQuery);
if (pg_num_rows($dinner3Result) > 0) {
$dinner3NameArray = pg_fetch_assoc($dinner3Result);
$dinner3Name = $dinner3NameArray['name'];
$dinner3cals = $dinner3NameArray['totalcal'];
$dinner3carbs = $dinner3NameArray['totalcarb'];
$dinner3protein = $dinner3NameArray['totalprotein'];
$dinner3fat = $dinner3NameArray['totalfat'];
} else {

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['breakfast1'])) {
		(int)$break1mult = $_POST['breakfast1'];
		(int)$break2mult = $_POST['breakfast2'];
		(int)$break3mult = $_POST['breakfast3'];
		(int)$lunch1mult = $_POST['lunch1'];
		(int)$lunch2mult = $_POST['lunch2'];
		(int)$lunch3mult = $_POST['lunch3'];
		(int)$dinner1mult = $_POST['dinner1'];
		(int)$dinner2mult = $_POST['dinner2'];
		(int)$dinner3mult = $_POST['dinner3'];
		(int)$cupsOfWater = $_POST['water'];
		 
		 $email = $_SESSION['email'];
		 
		 
		 $totalcal = ($breakfast1cals * $break1mult) + ($breakfast2cals * $break2mult) + ($breakfast3cals * $break3mult) + ($lunch1cals * $lunch1mult) + ($lunch2cals * $lunch2mult) + ($lunch3cals * $lunch3mult) + ($dinner1cals * $dinner1mult) + ($dinner2cals * $dinner2mult) + ($dinner3cals * $dinner3mult);
		 $totalprotein = ($breakfast1protein * $break1mult) + ($breakfast2protein * $break2mult) + ($breakfast3protein * $break3mult) + ($lunch1protein * $lunch1mult) + ($lunch2protein * $lunch2mult) + ($lunch3protein * $lunch3mult) + ($dinner1protein * $dinner1mult) + ($dinner2protein * $dinner2mult) + ($dinner3protein * $dinner3mult);
		 $totalfat = ($breakfast1fat * $break1mult) + ($breakfast2fat * $break2mult) + ($breakfast3fat * $break3mult) + ($lunch1fat * $lunch1mult) + ($lunch2fat * $lunch2mult) + ($lunch3fat * $lunch3mult) + ($dinner1fat * $dinner1mult) + ($dinner2fat * $dinner2mult) + ($dinner3fat * $dinner3mult);
		 $totalcarb = ($breakfast1carbs * $break1mult) + ($breakfast2carbs * $break2mult) + ($breakfast3carbs * $break3mult) + ($lunch1carbs * $lunch1mult) + ($lunch2carbs * $lunch2mult) + ($lunch3carbs * $lunch3mult) + ($dinner1carbs * $dinner1mult) + ($dinner2carbs * $dinner2mult) + ($dinner3carbs * $dinner3mult);
		 $totalwater = $cupsOfWater * 8;
		 
		 
		 $check_query = "SELECT * FROM public.\"UserHistory\" WHERE \"email\"='$email' AND date='$date'";
        	 $check_result = pg_query($db, $check_query);
        	 $count = pg_num_rows($check_result);
		 
		 if ($count > 0) {
		 echo "<p>Data for this date already exists.</p>";
		 } else {
		 
		 $insert_query = "INSERT INTO public.\"UserHistory\" (email, date, totalcal, totalcarb, totalfat, totalprotein, totalwater) VALUES ('$email', '$date', '$totalcal', '$totalcarb', '$totalfat', '$totalprotein', '$totalwater')";
            	$insert_result = pg_query($db, $insert_query);
            	$_SESSION['date'] = $date;
            	
            	if ($insert_result) {
                echo "<p>Recording successful!</p>";
                header("Location: results.php");
                exit();
            } else {
                echo "<p>Recording failed. Please try again later.</p>";
            }
		 
		 }
		 
		 
	}	
}

pg_close($db);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<link href="lightMode.css" rel="stylesheet"/>
<title>My FalconPal</title>
</head>

<body class="mainPage">
<div class="banner">
<img src="MyFalconPalLogo.png" class="center">
</div>

<button type="button" class="history-button" 
onclick="window.location.href='userHistory.php'">View My History
</button>

<div class="padding"></div>
<form name="enterDate" action="main.php" method="post">
<label for="curDate">Enter the date:</label>
<input type="date" id="curDate" name="curDate" required><br>
<div class="wrap">
<button type="submit">Enter</button>
</div>
</form>

 
<div class="main">
<h1>Date: <?php echo $date; ?></h1>
<h2>Breakfast</h2>
<hr class="solid">
<form action="main.php" method="post">
<label for="breakfast1">Servings of: <?php echo $breakfast1Name; ?></label><br>
<input type="number" id="breakfast1" name="breakfast1" min="0" placeholder="0" required><br>
<label for="breakfast2">Servings of: <?php echo $breakfast2Name; ?></label><br>
<input type="number" id="breakfast2" name="breakfast2" min="0" placeholder="0" required><br>
<label for="breakfast3">Servings of: <?php echo $breakfast3Name; ?></label><br>
<input type="number" id="breakfast3" name="breakfast3" min="0" placeholder="0" required><br>			
 
<h2>Lunch</h2>
<hr class="solid">
 
<label for="lunch1">Servings of: <?php echo $lunch1Name; ?></label><br>
<input type="number" id="lunch1" name="lunch1" min="0" placeholder="0" requried><br>
<label for="lunch2">Servings of: <?php echo $lunch2Name; ?></label><br>
<input type="number" id="lunch2" name="lunch2" min="0" placeholder="0" required><br>
<label for="lunch3">Servings of: <?php echo $lunch3Name; ?></label><br>
<input type="number" id="lunch3" name="lunch3" min="0" placeholder="0" required><br>			
 
<h2>Dinner</h2>
<hr class="solid">
 
 
<label for="dinner1">Servings of: <?php echo $dinner1Name; ?></label><br>
<input type="number" id="dinner1" name="dinner1" min="0" placeholder="0" required><br>
<label for="dinner2">Servings of: <?php echo $dinner2Name; ?></label><br>
<input type="number" id="dinner2" name="dinner2" min="0" placeholder="0" required><br>
<label for="dinner3">Servings of: <?php echo $dinner3Name; ?></label><br>
<input type="number" id="dinner3" name="dinner3" min="0" placeholder="0" requried><br>			
 
<h2>Hydration</h2>
<hr class="solid">
 
<label for="water">Cups of Water:</label><br>
<input type="number" id="water" name="water" min="0" placeholder="0" required><br>
<div class="wrap">
<button type="submit"
						onclick="solve()">
					Submit
</button>
</div>
</form>
</div>
<p>
<a href='login.php'
			style="text-decoration: none;">
			Logout
</a>
</p>
</body>
</html>

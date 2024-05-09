<?php session_start();
$db = pg_connect("host=localhost dbname=NutritionWarrior user=student password=CompSci364");

$email = $_SESSION['email'];
$date = $_SESSION['date'];

$results_query = "SELECT * FROM public.\"UserHistory\" WHERE date='$date' AND \"email\"='$email'";

$result = pg_query($db, $results_query);
$row = pg_fetch_assoc($result);

$cal = $row['totalcal'];
$carb = $row['totalcarb'];
$protein = $row['totalprotein'];
$fat = $row['totalfat'];
$water = $row['totalwater']


?>





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
			<h2><?php echo $email; ?> on <?php echo $date; ?></h2>

			<label for="calories">Total Calories: <?php echo $cal; ?> </label>
			<p id="calories"></p>

			<label for="protein">Total Protein: <?php echo $protein; ?> (g)</label>
			<p id="protein"></p>

			<label for="carbohydrates">Total Carbohydrates: <?php echo $carb; ?> (g)</label>
			<p id="carbohydrates"></p>

			<label for="fat">Total Fat: <?php echo $fat; ?> (g)</label>
			<p id="fat"></p>

			<label for="water">Water Intake: <?php echo $water; ?> (floz)</label>
			<p id="water"></p>
			
			<button onclick="location.href='main.php'">Select Another Date</button>

		</div>
 		</form>
    
    		<p>
		<a href='Login.php' style="text-decoration: none;"> Logout </a>
    		</p>
	</body>
	</html>

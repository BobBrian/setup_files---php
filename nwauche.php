<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Caf&eacute;!</title>
	<link rel="stylesheet" href="css/styles.css">
</head>

<body class="bodyStyle">

	<div id="header" class="mainHeader">
		<hr>
		<div class="center"> Nwauche Caf&eacute;</div>
	</div>
	<br>
	<hr>
	<div class="topnav">
		<a href="index.php">Home</a>
		<a href="#aboutUs">About Us</a>
		<a href="#contactUs">Contact Us</a>
	</div>
	<hr>
	<div id="mainContent">

		<div id="mainPictures" class="center">
			<table>
				<tr>
					<td><img src="images/Coffee-and-Pastries.jpg" height=auto width="490"></td>
					<td><img src="images/Cake-Vitrine.jpg" height=auto width="450"></td>
				</tr>
			</table>
			<hr>
			<div id="header" class="mainHeader"><p>Nwauche caf&eacute; Employee List!</p></div>
			<br>

		<?php
		// Database connection parameters
		$connection_string = "host=nwauche-instance-database-1.che2gowucmtf.us-east-1.rds.amazonaws.com port=5432 dbname=nwaucheRDS user=postgres password=chibuikem123";
		$connection = pg_connect($connection_string) or die("Could not connect to the database: " . pg_last_error());

		
		$query = "SELECT * FROM employee";  
		$result = pg_query($connection, $query) or die("Error reading data: " . pg_last_error());

		// Start the table
		echo '<table border="1" cellpadding="10" cellspacing="0" class="center">';
		echo '<tr>';
		echo '<th>ID</th>';
		echo '<th>First Name</th>';
		echo '<th>Last Name</th>';
		echo '<th>Position</th>'; 
		echo '<th>Created At</th>'; 
		echo '</tr>';

		// Fetch each row and display it in the table
		while ($row = pg_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>' . $row['id'] . '</td>';
			echo '<td>' . $row['fname'] . '</td>';
			echo '<td>' . $row['lname'] . '</td>';
			echo '<td>' . $row['position'] . '</td>';  // Display position
			echo '<td>' . $row['created_at'] . '</td>'; // Display created_at
			echo '</tr>';
		}

		// End the table
		echo '</table>';

		
		?>
		</div>
	</div>
</body> 
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Status Information</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<h1>Status Information</h1>
	<?php
		require_once ("/home/yfd0036/conf/settings.php");
		$status = $_GET["searchStatus"];
		$query = "select * from yfd0036.Status where Status like '%$status%'";

		$dbConnect = @mysqli_connect($host, $user, $pswd, $dbnm);
		if (!$dbConnect) {
			die("<p>The database server is not available.</p>");
		}
		else{
			$result = mysqli_query($dbConnect, $query);
			if (!$result) { 
			echo "<p>Somthing is wrong with the query</p>";

			}
			else{
				if(mysqli_num_rows($result) > 0){
						while ($row = mysqli_fetch_assoc($result)) {
						echo "<p>Status: " . $row["Status"] . "<br>Status Code: " . $row["Status_ID"] . "<br><br>" 
						. "Share: " . $row["Share_Status"] . "<br>" . "Date Posted: " . $row["Date"] . "<br>" 
						. "Permission: " . $row["Permissions"] . "</p><hr>";
					}
				}
				else{
					echo "<p>No results</p>";
				}
				
			}
		}

	?>
	<br>
	<a href="searchstatusform.html">Search for another status</a>
	<br>
	<a href="index.html">Return to Home Page</a>

</body>
</html>
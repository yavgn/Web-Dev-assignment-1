<!DOCTYPE html>
<html>
<head>
	<title>Status Posting System</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<h1>Status Posting System</h1>
	<?php
		$code = $_POST["statusCode"]; 
		$status = $_POST["status"];
		$shareStatus = $_POST["shareStatus"];
		$date = $_POST["date"];
		
		require_once ("/home/yfd0036/conf/settings.php");

		if(empty($code) || empty($status) || empty($shareStatus) || empty($date) && preg_match('^S\d{4}$', $code)){
			if (preg_match('^S\d{4}$', $code)) {
				echo "<p>Incorrect use of Status Code</p>";
			}
			else{
				echo "<p> Missing fields </p>";
			}
		}
		else{
			$dbConnect = @mysqli_connect($host, $user, $pswd, $dbnm);
			if (!$dbConnect) {
				die("<p>The database server is not available.</p>");
			}
			else{	
				if(isset($_POST["perms"])){
					$perms = implode(' ', $_POST["perms"]);
				}
				else{
					$perms = "None";
				}
				$query = "insert into yfd0036.Status"."(Status_ID, Status, Share_Status, Date, Permissions)"."values"."('$code','$status','$shareStatus','$date','$perms')";
				if (mysqli_query($dbConnect, $query)){
					echo "<p>Record successfully inserted </p>";

					echo "<p>Code: " . $code  . "</p>" . "<p>Status: " . $status  . "</p>" .
					"<p>Share State: " . $shareStatus  . "</p>" . "<p>Date: " . $date  . "</p>" . 
					"<p>Permissions: " . $perms  . "</p>";
				}
				else{
					echo "Error, something is wrong with the query";
				}
				
			}
			mysqli_close($dbConnect);
		}

	?>
	<a href="poststatusform.php">Post another status</a>
	<br>
	<a href="index.html">Return to Home Page</a>
</body>
</html>
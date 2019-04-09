<!DOCTYPE html>
<html>
<head>
	<title>Status Posting System</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<h1>Status Posting System</h1>
	<?php
		//initialise global variables
		$code = $_POST["statusCode"]; 
		$status = $_POST["status"];
		$shareStatus = $_POST["shareStatus"];
		$date = $_POST["date"];
	
		require_once ("/home/yfd0036/conf/settings.php");

		$checkCode = "Select Status_ID from yfd0036.Status where Status_ID = '$code'";
		$checkTable = "Show tables where Tables_in_yfd0036 = 'Status'";
		$createTable = "Create table if not exists Status(Status_ID varchar(5) not null, Status varchar(100) not null, Share_Status varchar(10) not null, Date date not null, Permissions varchar(40), Primary Key (Status_ID))";

		//set up connection
		$dbConnect = @mysqli_connect($host, $user, $pswd, $dbnm);
		if (!$dbConnect){
			die("<p>The database server is not available.</p>");
		}
		//create table if it doesnt exist
		mysqli_query($dbConnect, $createTable);

		//checks for missing fields, pattern of status code and pattern of status
		if(empty($code) || empty($status) || empty($shareStatus) || empty($date) || preg_match('/^S\d{4}$/', $code) == false || preg_match('/^[a-zA-Z0-9,.!? ]*$/', $status) == false){
			if (!preg_match('/^S\d{4}$/', $code)) {
				echo "<p>Incorrect use of Status Code</p>";
			}
			elseif (!preg_match('/^[a-zA-Z0-9,.!? ]*$/', $status)) {
				echo "<p>Please enter alphanumeric values</p>";
			}
			else{
				echo "<p> Missing fields </p>";
			}
		}
		//checks if permissions are set, if not perms is none
		else{
			if(isset($_POST["perms"])){
				$perms = implode(' ', $_POST["perms"]);
			}
			else{
				$perms = "None";
			}
			//query to insert into
			$query = "insert into yfd0036.Status"."(Status_ID, Status, Share_Status, Date, Permissions)"."values"."('$code','$status','$shareStatus','$date','$perms')";
			if (mysqli_query($dbConnect, $query)){
				echo "<p>Code: " . $code  . "</p>" . "<p>Status: " . $status  . "</p>" .
				"<p>Share State: " . $shareStatus  . "</p>" . "<p>Date: " . $date  . "</p>" . 
				"<p>Permissions: " . $perms  . "</p>";
			}
			else{
				//checks if status code exist
				$result = mysqli_query($dbConnect, $checkCode);
				if (mysqli_num_rows($result) > 0) {
					echo "<p>Code already exists</p>";
				}
				else{
					echo "<p>Error, something is wrong with the query</p>";
				}
			}	
		}
		mysqli_close($dbConnect);

	?>
	<a href="poststatusform.php">Post another status</a>
	<br>
	<a href="index.html">Return to Home Page</a>
</body>
</html>
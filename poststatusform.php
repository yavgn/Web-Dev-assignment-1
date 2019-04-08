<!DOCTYPE html>
<html>
<head>
	<title>Status Posting System</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<h1>Status Posting System</h1>
	<form action="poststatusprocess.php" method="post">
		<label>Status Code (required): <input type="text" name="statusCode"></label>
		<br>
		<label>Status (required): <input type="text" name="status"></label>
		<br><br>
		<label>Share: </label>
		<input type="radio" name="shareStatus" value="Public"> 
		<label> Public </label>
		<input type="radio" name="shareStatus" value="Friends">
		<label>Friends </label>
		<input type="radio" name="shareStatus" value="Only Me"> 
		<label>Only Me</label>
		<br>
		<label>Date </label> 
		<input type="Date" name="date" value="<?php echo date ('Y-m-d');?>">
		<br>
		<label>Permission Type: </label> 
		<input type="checkbox" name="perms[]" value="Allow Like"> 
		<label>Allow Like </label>
		<input type="checkbox" name="perms[]" value="Allow Comment"> 
		<label>Allow Comment </label>
		<input type="checkbox" name="perms[]" value="Allow Share"> 
		<label>Allow Share </label>
		<br> 
		<input type="submit" name="postStatus" value="Post">
		<input type="reset" name="resetStatus" value="Reset">
	</form>
	<a href="index.html">Return to Home Page</a>
</body>
</html>
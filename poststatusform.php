<!DOCTYPE html>
<html>
<head>
	<title>Status Posting System</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<h1>Status Posting System</h1>
	<nav>
		<a class="menubtn" href="index.html">Home</a>
		<a class="menubtn" href="poststatusform.php">Post</a> 
		<a class="menubtn" href="searchstatusform.html">Search</a>
		<a class="menubtn" href="about.html">About</a>
	</nav>
	<br>
	<form action="poststatusprocess.php" method="post">
		<label>Status Code (required): <input type="text" name="statusCode"></label>
		<br>
		<label>Status (required): </label>
		<input type="text" name="status">
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
</body>
</html>
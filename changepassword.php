<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
	<link rel="stylesheet" type="text/css" href="radiobutton.css">
</head>
<body>

<?php
    include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
?>

    <div class="box" style="height:400px; transform:translate(-45%,-45%);">
	<img src="password.png" class="userimage" height="90px" width="90px" align="left"><h2>CHANGE PASSWORD</h2>

	<form action="savechangepassword.php" method="post">
	<BR>

	<input type="password" name="cpassword" placeholder="Enter Current Password" required="" style="margin-bottom:20px;">

	<input type="password" name="npassword" placeholder="Enter New Password" required="" style="margin-bottom:20px;">

	<input type="password" name="rpassword" placeholder="Retype New Password" required="" style="margin-bottom:20px;">
	
	<BR><BR>
	<input type="submit" name="submit" value="U P D A T E    P A S S W O R D">
	</form>
</div>

</body>
</html>
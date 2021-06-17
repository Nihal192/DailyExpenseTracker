<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>

<div class="box">
	<table width="100%"><tr align="center"><td><img src="user.png" class="userimage" height="70px" width="70px"></td></tr></table>
	<h2>NEW ADMIN USER</h2>
	<form action="checkadminsignup.php" method="post">
	<p>USERNAME</p>
	<input type="text" name="username" placeholder="Enter Username" required="">
	<p>PASSWORD</p>
	<input type="password" name="password" placeholder="Enter Password" required="">
	<p>RETYPE PASSWORD</p>
	<input type="password" name="repassword" placeholder="Retype Password" required="">
	<input type="submit" name="submit" value="CREATE USER">
	</form>
</div>

</body>
</html>
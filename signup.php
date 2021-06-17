<!DOCTYPE html>
<!doctype html>

<html>
	<head>
	
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="logincss.css">

</head>
<body><header>
	<nav>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<h1>DAILY EXPENSE TRACKER</h1>
		<ul id="menu">
	     <li><a href="index.html"><a href="index.html"><i class="fa fa-home"></i> HOME</a></li>
		 <li><a href="login.html"> <i class="fa fa-user" aria-hidden="true"></i> LOGIN</a></li>
	      <li><a href="signup.php"><i class="fa fa-sign-in" aria-hidden="true"></i> SIGNUP</a></li>
	     <li><a href="about.php"><i class="fa fa-globe" aria-hidden="true"></i> ABOUT</a></li>
		</ul>
	</nav>
</header>
<div class="divider"></div>
<div class="loginBox" style="transform: translate(-50%, -45%); height: 460px;">
	<table width="100%"><tr align="center"><td><img src="user.png" class="userimage" height="70px" width="70px"></td></tr></table>
	<h2>S I G N  U P</h2>
	<form action="checksignup.php" method="post">
	<p>USERNAME</p>
	<input type="text" name="username" placeholder="Enter Username" required="">
	<p>PASSWORD</p>
	<input type="password" name="password" placeholder="Enter Password" required="">
	<p>RETYPE PASSWORD</p>
	<input type="password" name="repassword" placeholder="Retype Password" required="">
	<input type="submit" name="submit" value="S I G N  U P">
	</form>
</div>


</body>
</html>
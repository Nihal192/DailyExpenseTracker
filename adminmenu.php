<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body>
<nav class="mainmenu">
	 <ul class="submainmenu">
	 	<li><a href="adminmain.php" target="right"><i class="fa fa-home"></i> Home</a></li>
	 	

	 	
	 	<li><a href=""><i class="fa fa-user-o" aria-hidden="true"></i> User<span class="downarrow"></span></a>
	 	<ul><li><a href="addadminuser.php" target="rightside">New</a></li>
	 			<li><a href="deleteadminuser.php" target="rightside">Delete-Admin</a></li>
	 			<li><a href="deletenormaluser.php" target="rightside">Delete-Normal</a></li>

	 	</ul>
	 	</li>
	 	
	 		<li><a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i> Report<span class="downarrow"></a>
	 		<ul>	<li><a href="showadminusers.php" target="rightside">Admin-Users</a></li>
	 				<li><a href="shownormalusers.php" target="rightside">Normal-Users</a></li>
	 		</ul>
	 		</li>
	 		<li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Password<span class="downarrow"></a>
	 			<ul>	<li><a href="changepassword.php" target="rightside">Change</a></li>
	 			</ul>
	 		</li>
	 		<li><a href="logout.php"><em class="fa fa-power-off"></em> Logout</a></li>
	 </ul>
</nav>

</body>
</html>
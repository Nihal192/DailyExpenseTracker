<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
	<link rel="stylesheet" type="text/css" href="radiobutton.css">
	<link rel="stylesheet" type="text/css" href="checkbox.css">
</head>
<body>

<?php
    include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
	$tablename = $username."entries";	
?>

<div class="box" style="height:500px; transform:translate(-45%,-45%);">
<img src="daily.png" class="userimage" height="150px" width="150px" align="left"><h2>DATE RANGE REPORT</h2>

<form action="showrepdaterange.php" method="post">
<BR><BR>
<input type="label" placeholder="Select Dates..." readonly  
       style="margin-bottom:20px; border: none; color: #aaa; letter-spacing: .2em; background: transparent; font-size: 18px;">

<table width="100%">
	<tr><td style="color:#aaa;">Start Date: </td>
		<td style="vertical-align:bottom;"><input type="date" name="startdate" value="<?php echo date('Y-m-d');?>"  required=""></td>
	</tr>
</table>
<table width="100%">
	<tr><td style="color:#aaa;">End Date: </td>
		<td style="vertical-align:bottom;"><input type="date" name="enddate" value="<?php echo date('Y-m-d');?>"  required=""></td>
	</tr>
</table>
<BR><BR>
<input type="submit" name="submit" value="S H O W  R E P O R T">
</form>
</div>

</body>
</html>
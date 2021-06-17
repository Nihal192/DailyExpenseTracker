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
<img src="daily.png" class="userimage" height="150px" width="150px" align="left"><h2>DAILY REPORT</h2>

<form action="showrepdaily.php" method="post">
<BR><BR>

<input type="label" placeholder="Select Date :" readonly  
       style="margin-bottom:20px; border: none; color: #aaa; letter-spacing: .2em; 
		background: transparent; font-size: 18px;">

<table width="100%">
	<tr><td style="color:#aaa;">Entry Date: </td>
		<td style="vertical-align:bottom;"><input type="date" name="entrydate" value="<?php echo date('Y-m-d');?>"  required=""></td>
	</tr>
</table>
	
<BR><BR><BR><BR>
<input type="submit" name="submit" value="S H O W  R E P O R T">
</form>
</div>

</body>
</html>
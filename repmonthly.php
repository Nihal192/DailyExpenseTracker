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

	$currentyear=date("Y");	
?>

<div class="box" style="height:500px; transform:translate(-45%,-45%);">
<img src="monthly.png" class="userimage" height="150px" width="150px" align="left" style="margin-left:60px;">
<BR><h2>MONTHLY REPORT</h2>

<form action="showrepmonthly.php" method="post">

<input type="label" placeholder="Select Month & Year :" readonly  
       style="margin-bottom:20px; border: none; color: #aaa; letter-spacing: .2em;
		background: transparent; font-size: 18px;">
<BR><BR>
<select name="month" style="margin-left: 40px;">
  <option value="1">JAN</option>
  <option value="2">FEB</option>
  <option value="3">MAR</option>
  <option value="4">APR</option>
  <option value="5">MAY</option>
  <option value="6">JUN</option>
  <option value="7">JUL</option>
  <option value="8">AUG</option>
  <option value="9">SEP</option>
  <option value="10">OCT</option>
  <option value="11">NOV</option>
  <option value="12">DEC</option>
</select>
	
<select name="year" style="margin-left: 40px;">
<?php
for($i=$currentyear; $i>= $currentyear-3; $i=$i-1)
	echo "<option value='$i'>$i</option>";
?>
</select>

<BR><BR><BR><BR><BR><BR><BR><BR>
<input type="submit" name="submit" value="S H O W  R E P O R T">
</form>
</div>

</body>
</html>
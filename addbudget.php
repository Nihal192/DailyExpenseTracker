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
	$tablename = $username."entries";

	$currentyear=date("Y");	

	$display_months = array(1 => 'JAN', 2 => 'FEB', 3 => 'MAR', 4 => 'APR', 5 => 'MAY', 6 => 'JUN', 7 => 'JUL', 8 => 'AUG', 9 => 'SEP', 10 => 'OCT', 11 => 'NOV', 12 => 'DEC');

	$qry="select category from categories where username='$username'";
	//echo $qry;
	$option="";
	if ($result = mysqli_query($conn, $qry))
	{
		foreach ($result as $row) 
		{
    			$id = $row['category'];
    			$option.='<option value="'.$id.'">'.$id.'</option>';
		}
	}
?>

    <div class="box" style="height:500px; transform:translate(-45%,-45%);">
	<img src="budget.png" class="userimage" height="120px" width="140px" align="left"><h2>SET BUDGET LIMIT</h2>

	<form action="savebudget.php" method="post">
	
	<h3 style="color:#aaa; letter-spacing: .2em;">Select YEAR:</h3>
	<select name="year" style="margin-left: 100px;">
	<?php	for($i=$currentyear; $i<=$currentyear+1; $i=$i+1)
				echo "<option value='$i'>$i</option>";	?>
	</select>

	<h3 style="color:#aaa; letter-spacing: .2em;">Select MONTH:</h3>
	<select name="month" style="margin-left: 100px;">
	<?php	for($i=1; $i<= 12; $i=$i+1)
			echo "<option value='$i'>$display_months[$i]</option>";	?>
	</select>

	<h3 style="color:#aaa; letter-spacing: .2em;">Select Category:</h3>
	<select name="category" required="" 
	style="width:100%;margin-bottom:10px;">
			<?php echo $option ?>
	</select>
	
	<input type="text" name="limitamount" placeholder="Amount to Limit" required="" 
	style="margin-bottom: 10px;">
	
	<BR><BR>
	<input type="submit" name="submit" value="SAVE ENTRY">
	</form>
</div>

</body>
</html>
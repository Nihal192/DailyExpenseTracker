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
	<img src="newentry.png" class="userimage" height="90px" width="90px" align="left"><h2>NEW ENTRY</h2>

	<form action="savenewentry.php" method="post">
	<BR>

	<input type="hidden" name="recid" value="<?php echo $recid; ?>">

	<input type="text" name="item" placeholder="Enter Item Name" required="" 
	style="margin-bottom:20px;">
	
	<h3 style="color:#aaa; letter-spacing: .2em;">Select Category:</h3>
	<select name="category" required="" 
	style="width:100%;margin-bottom:10px;">
			<?php echo $option ?>
	</select>
	<BR><BR>
	<input type="text" name="price" placeholder="Amount" required="" 
	style="margin-bottom: 10px;">
	
	<BR><BR>
	<table width="100%">
			<tr><td style="color:#aaa;">Entry Date: </td>
				<td style="vertical-align:bottom;"><input type="date" name="entrydate" value="<?php echo date('Y-m-d');?>"  required=""></td>
			</tr>
	</table>
	<BR><BR>
	<input type="submit" name="submit" value="SAVE ENTRY">
	</form>
</div>

</body>
</html>
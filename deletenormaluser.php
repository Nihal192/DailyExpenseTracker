<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>

<?php
    include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];

	$qry="select username from login where usertype='normal'";
	//echo $qry;
	$option="";
	if ($result = mysqli_query($conn, $qry))
	{
		foreach ($result as $row) 
		{
    			$id = $row['username'];
    			$option.='<option value="'.$id.'">'.$id.'</option>';
		}
	}
?>


<div class="box" style="height: 400px; transform: translate(-45%,-45%); ">
	<BR><BR>
	<img src="delete.png" class="userimage" height="70px" width="70px" align="left"><h2>Delete Normal USER</h2>

	<form action="deleteuser.php" method="post">
		<h3 style="color:#aaa; letter-spacing: .2em;">Exisiting Normal Users:</h3> 
		<select name="deluser" style="width:100%;">
			<?php echo $option ?>
		</select>
		<BR><BR><BR>
		
		<BR><BR><BR>
		<input type="submit" name="submit" value="D E L E T E    U S E R">
	</form>
</div>

</body>
</html>
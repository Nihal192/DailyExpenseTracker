<?php
$recid = intval($_GET['recid']);
//echo "$recid";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
	<link rel="stylesheet" type="text/css" href="radiobutton.css">
</head>
<body>

<?php
    include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
	$tablename = $username."entries";

	//Selecting particular record...
	$qry="select * from budgetlimit where recid=$recid and username='$username'";
	echo $qry;
	$result= $conn->query($qry);
	$row = $result->fetch_assoc();
	
	$category=$row['category'];
	$month=$row['month'];
	$year=$row['year'];
	$limitamount=$row['limitamount'];
?>

    <div class="box" style="height:500px; transform:translate(-45%,-45%);">
	<img src="delete.png" class="userimage" height="100px" width="100px" align="left"><h2>DELETE BUDGET LIMIT</h2>

	<form action="deletebudgetfinally.php" method="post">
	<BR>

	<input type="hidden" name="recid" value="<?php echo $recid; ?>">

	<input type="text" readonly value="<?php echo $category;?>" 
			style="margin-bottom:20px;">
	
	<input type="text" readonly value="<?php echo $month;?>" 
			style="margin-bottom:20px;">
	
	<input type="text"  readonly value="<?php echo $year;?>" 
			style="margin-bottom: 20px;">
	
	<input type="text" readonly value="<?php echo $limitamount;?>" 
			style="margin-bottom: 20px;">
	
	<BR><BR>
	<input type="submit" name="submit" value="DELETE FINALLY">
	</form>
</div>

</body>
</html>
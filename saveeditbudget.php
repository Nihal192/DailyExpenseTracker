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
	
	//Selecting particular record...
	$qry="select * from budgetlimit where recid=$recid and username='$username'" ;
	//echo $qry;
	$result= $conn->query($qry);
	$row = $result->fetch_assoc();
	
	$category=$row['category'];
	$month=$row['month'];
	$year=$row['year'];
	$limitamount=$row['limitamount'];
	//Selecting particular record is finished...

	//getting ready for options of Categories
	$qry="select category from categories where username='$username'";
	//echo $qry;
	$option="";
	if ($result = mysqli_query($conn, $qry))
	{
		foreach ($result as $row) 
		{
    			$id = $row['category'];
    			if(strcmp($id, $category)==0)
    			$option.='<option value="'.$id.'" selected>'.$id.'</option>';
    			else
				$option.='<option value="'.$id.'">'.$id.'</option>';
		}
	}
?>

    <div class="box" style="height:500px; transform:translate(-45%,-45%);">
	<img src="edit1.png" class="userimage" height="70px" width="70px" align="left"><h2>MODIFY BUDGET LIMIT</h2>

	<form action="editbudgetfinally.php" method="post">
	<BR>

	<input type="hidden" name="recid" value="<?php echo $recid; ?>">
	
	<h3 style="color:#aaa; letter-spacing: .2em;">Select Category:</h3>
	<select name="category" required="" style="width:100%;margin-bottom:10px;">
			<?php echo $option ?>
	</select>

	<input type="text" name="month" value="<?php echo $month ?>" placeholder="Enter Month Number" required="" style="margin-bottom:20px;">
	
	<BR><BR>
	<input type="text" name="year" value="<?php echo $year ?>" placeholder="Enter Year" required="" style="margin-bottom: 10px;">

	<BR><BR>
	<input type="text" name="limitamount" value="<?php echo $limitamount ?>" placeholder="Limit Amount" required="" style="margin-bottom: 10px;">
	<BR>
	<input type="submit" name="submit" value="UPDATE LIMIT FINALLY">
	</form>
</div>

</body>
</html>
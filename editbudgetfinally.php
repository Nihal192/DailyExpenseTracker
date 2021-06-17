<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
</head>
<body>
<?php
	include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
	$tablename = $username."entries";


	$recid = $_POST['recid'];
	$category = ($_POST['category']);
	$month = ($_POST['month']);
	$year = ($_POST['year']);
	$limitamount = ($_POST['limitamount']);
	
	//Update entry logic
	$qry="update budgetlimit set  category='$category', month='$month', year=$year ,limitamount='$limitamount' where recid=$recid and username='$username'";
	//echo $qry;
	$result=$conn->query($qry);
 	if($result < 0)   
 		{  echo ("Limit is NOT-Updated :::: UN-Successful"); }
	else
   		{
    	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Limit is UPDATED :: Successfully...');
        		window.open(\"normalmain.php\",\"_top\"); </script>");
   		}
?>
</body>
</html>
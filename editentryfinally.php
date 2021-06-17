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
	$item = ($_POST['item']);
	$category = ($_POST['category']);
	$price = ($_POST['price']);
	$entrydate = ($_POST['entrydate']);
	$entrydate = date("Y-m-d", strtotime($entrydate));

	//Update entry logic
	$qry="update $tablename set  item='$item', categories='$category', price=$price ,entrydate='$entrydate' where recid=$recid";
	//echo $qry;
	$result=$conn->query($qry);
 	if($result < 0)   
 		{  echo ("Record is NOT-Updated :::: UN-Successful"); }
	else
   		{
    	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Record is UPDATED :: Successfully...');
        		window.open(\"normalmain.php\",\"_top\"); </script>");
   		}
?>
</body>
</html>
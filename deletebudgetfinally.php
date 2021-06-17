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
	$tablename = "budgetlimit";
	$recid = $_POST['recid'];   //selected record id
	
		//delete record from entry table
		$qry="delete from $tablename where recid=$recid and username='$username'";
		$result=$conn->query($qry);
 		if($result < 0)   
 		{  
 			echo ("LIMIT is NOT-DELETED :::: UN-Successful"); 
 		}
		else
   		{
    	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('LIMIT DELETED :: Successfully...');
        		window.open(\"normalmain.php\",\"_top\"); </script>");
   		}
   	
?>
</body>
</html>
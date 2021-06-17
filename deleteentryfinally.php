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
	$recid = $_POST['recid'];   //selected record id
	
		//delete record from entry table
		$qry="delete from $tablename where recid=$recid";
		$result=$conn->query($qry);
 		if($result < 0)   
 		{  
 			echo ("RECORD is NOT-DELETED :::: UN-Successful"); 
 		}
		else
   		{
    	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Entry DELETED :: Successfully...');
        		window.open(\"normalmain.php\",\"_top\"); </script>");
   		}
   	
?>
</body>
</html>
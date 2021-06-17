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
	$deluser = $_POST['deluser'];   //selected user for delete
	
	//This is delete user type logic...	
	$qry="select usertype,status from login where username='$deluser'";
	//echo $qry;
	$option="";
	if ($result = mysqli_query($conn, $qry))
	{
		foreach ($result as $row) 
		{
    			$deltype = $row['usertype'];
    			$status = $row['status'];
		}
	}
	//echo "$deluser <BR>";
	//echo "$deltype";
	//echo "$status";
	
	if($deltype=='admin' and $deluser != $username)
	{
		$qry="delete from login where username='$deluser'";
		//echo $qry;
		$result=$conn->query($qry);
 		if($result < 0)   
 		{  
 			echo ("USER is NOT-DELETED :::: UN-Successful"); 
 		}
		else
   		{
   			$qry="delete from personalinfo where username='$deluser'";
   			//echo $qry;
			$result=$conn->query($qry);
 			if($result < 0)   
 			{  
 				echo ("USER is NOT-DELETED :::: UN-Successful"); 
 			}
 			else
 			{
    		echo ("<script LANGUAGE='JavaScript'>
    			window.alert('USER DELETED :: Successfully...');
        		window.open(\"adminmain.php\",\"_top\"); </script>");
    		}
   		} 
	}
	else if($deltype=='normal')
 	{
 		$qry="update login set status='unactive' where username='$deluser'";
		$result=$conn->query($qry);

		echo ("<script LANGUAGE='JavaScript'>
    			window.alert('USER DELETED :: Successfully...');
        		window.open(\"adminmain.php\",\"_top\"); </script>");
    	}	
    else
    {
    	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('USER Cannot be DELETED :: UnSuccessfully...');
        		window.open(\"adminmain.php\",\"_top\"); </script>");
    }
?>
</body>
</html>
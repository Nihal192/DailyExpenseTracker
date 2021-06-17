<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
	$tablename = $username."entries";

	$year = ($_POST['year']);
	$month = ($_POST['month']);
	$category = ($_POST['category']);
	$limitamount = ($_POST['limitamount']);


	$qry="select max(recid) from budgetlimit where username='$username'";
	$result = $conn->query($qry);
	if ($result->num_rows==1 ) 
	{
	    $row = $result->fetch_assoc();
        $recid=$row['max(recid)'];
       	$recid=$recid + 1;
    }
    else
    	$recid= 1;

	
	//New entry insertion logic
	$qry="insert into budgetlimit values($recid,'$username','$category',$month,$year,$limitamount)";
	//echo $qry;
	$result=$conn->query($qry);
	//echo $result;
	
 	if($result != 1)   
 		{  echo ("<script LANGUAGE='JavaScript'>
 			      window.alert('Limit is NOT-Created,May Limit is already Exist :::: UN-Successful');
 			      window.open(\"normalmain.php\",\"_top\"); </script>");
 		}
	else
   		{
    	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Limit is Created :: Successfully...');
        		window.open(\"normalmain.php\",\"_top\"); </script>");
   		}
?>
</body>
</html>
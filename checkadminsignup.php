<html>
<head>
	<title>Daily Expense Tracker</title>
</head>
<body>
	<?php
	include ("connection.inc");

	$txtuid = ($_POST['username']);
	$txtpass = ($_POST['password']);
	$txtrepass = ($_POST['repassword']);

	$qry="SELECT * FROM login WHERE username = '" .$txtuid."'";
	//echo $query;
	
	$result = $conn->query($qry);
	if ($result->num_rows ==1 ) 
	{
	    echo ("<script>alert (\"Please, Choose Another UserName\"); history.go(-1) </script>  ");
			exit();	
	}
	else
	{
		//echo "Creating user...";
		if($txtpass != $txtrepass)
		{
			echo ("<script>alert (\"Please, Re-Enter your Passwords ...\"); history.go(-1) </script>  ");
			exit();
		}
		else
		{
			//New User's insertion logic
			$query="insert into login values('$txtuid','$txtpass','admin')";
 			$result=$conn->query($query);
 			if($result < 0)   {  echo ("USER NOT-CREATED :::: UN-Successful"); }
			else
   			{
   					//echo ("User Created Successfully");

   					$qry="insert into personalinfo(username) values('" . $txtuid . "')";
 					$result=$conn->query($qry);
					//Normal user's categories created logic complete....	
					echo ("<script LANGUAGE='JavaScript'>
    						window.alert('USER-CREATED Successfully...');
    						window.open(\"adminmain.php\",\"_top\");</script>");  
			}
		}
	}
?>
</body>
</html>
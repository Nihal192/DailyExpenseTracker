<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include ("connection.inc");

	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
	$cpassword = ($_POST['cpassword']);
	$npassword = ($_POST['npassword']);
	$rpassword = ($_POST['rpassword']);

	$qry="SELECT * FROM login WHERE username = '$username' and 
			password='$cpassword'";
	//echo $qry;
	
	$result = $conn->query($qry);
	if ($result->num_rows!=1 ) 
	{
	    echo ("<script>alert (\"Your current password is WRONG !!!...\"); history.go(-1) </script>  ");
			exit();	
	}
	else
	{
		//echo "Creating user...";
		if($npassword != $rpassword)
		{
			echo ("<script>alert (\"Please, New-Password and Re-Passwords are Not Matching ...\"); history.go(-1) </script>  ");
			exit();
		}
		else
		{
			//Password updation logic
			$query="UPDATE login set password='$npassword' where username='$username'";
 			$result=$conn->query($query);
 			if($result < 0)   {  echo ("Password NOT UPDATED :::: UN-Successful"); }
			else
   			{
   					if($usertype=='normal')
					{
   						echo ("<script LANGUAGE='JavaScript'>
    					window.alert('PASSWORD UPDATED :: Successfully...');
        				window.open(\"normalmain.php\",\"_top\"); </script>");	
    				}
    				else
    				{
    					echo ("<script LANGUAGE='JavaScript'>
    					window.alert('PASSWORD UPDATED :: Successfully...');
        				window.open(\"adminmain.php\",\"_top\"); </script>");
    				}
			}
		}
	}
?>
</body>
</html>
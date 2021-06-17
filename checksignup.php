<html>
<head>
	<title></title>
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
			$query="insert into login values('$txtuid','$txtpass','normal')";
 			$result=$conn->query($query);
 			if($result < 0)   {  echo ("User NOT-Created :::: UN-Successful"); }
			else
   			{
   					//echo ("User Created Successfully");

   					//Inserting Default Categories for each new-normal-user...
   					$qry="insert into categories values('$txtuid','Petrol')";
 					$result=$conn->query($qry);;
 					$qry="insert into categories values('$txtuid','Diesel')";
 					$result=$conn->query($qry);
 					$qry="insert into categories values('$txtuid','Education Fees')";
 					$result=$conn->query($qry);
 					$qry="insert into categories values('$txtuid','Fast Food')";
 					$result=$conn->query($qry);
 					$qry="insert into categories values('$txtuid','Hotel')";
 					$result=$conn->query($qry);
 					$qry="insert into categories values('$txtuid','Stationary')";
 					$result=$conn->query($qry);
 					$qry="insert into categories values('$txtuid','House Hold')";
 					$result=$conn->query($qry);
 					$qry="insert into categories values('$txtuid','LightBill')";
 					$result=$conn->query($qry);

 					//Creating a table for each normal user
 					$tablename=$txtuid . "Entries";
					//echo $tablename;
 					
 					$qry="create table " . $tablename . " (recid int(10),item text(25),categories text(20),price float(10),entrydate date)";
 					$result=$conn->query($qry);

 					$qry="insert into personalinfo(username) values('" . $txtuid . "')";
 					$result=$conn->query($qry);
					//Normal user's categories created logic complete....	
					echo ("<script LANGUAGE='JavaScript'>
    						window.alert('User-CREATED Successfully...');
    						window.location.href='index.html';
    						</script>");  
			}
		}
	}
?>
</body>
</html>
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

	$firstname = ($_POST['firstname']);
	$lastname = ($_POST['lastname']);
	$address = ($_POST['address']);
	$city = ($_POST['city']);
	$pincode = ($_POST['pincode']);
	$country = ($_POST['country']);
	$dob = ($_POST['dob']);
	$gender = ($_POST['gender']);
	$mobile = ($_POST['mobile']);
	$email = ($_POST['email']);
	
	//converted to mysql date format "Y-m-d"
	$dob = date("Y-m-d", strtotime($dob));

	/*  echo $username . "<BR>";
	echo $firstname . "<BR>";
	echo $lastname . "<BR>";
	echo $address . "<BR>";
	echo $city . "<BR>";
	echo $pincode . "<BR>";
	echo $country . "<BR>";
	echo $dob . "<BR>";
	echo $gender . "<BR>";
	echo $mobile . "<BR>";
	echo $email . "<BR>";
	*/
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
 		echo ("<script>alert (\"Please, Correct Your Email-Address.\"); history.go(-1) </script>  ");
	}
	
	$qry="UPDATE personalinfo SET 
			firstname  = '". $firstname . "'". 
			",lastname  = '". $lastname . "'".
			",address  = '". $address ."'". 
			",city  = '". $city ."'". 
			",mobile  = ". $mobile . 
			",email  = '". $email . "'". 
			",gender  = '". $gender . "'".
			",pincode  = ". $pincode . 
			",country  = '". $country ."'". 
			",dob  = '". $dob ."'".
		    " where username='".$username ."'";
	//echo $qry;
	$result=$conn->query($qry);;
	
	if($usertype=='normal')
	{
   	echo ("<script LANGUAGE='JavaScript'>
    	window.alert('USER PROFILE UPDATED :: Successfully...');
        window.open(\"normalmain.php\",\"_top\"); </script>");	
    }
    else
    {
    echo ("<script LANGUAGE='JavaScript'>
    	window.alert('USER PROFILE UPDATED :: Successfully...');
        window.open(\"adminmain.php\",\"_top\"); </script>");
    }

	?>
</body>
</html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include ("connection.inc");

	$txtuid = ($_POST['username']);
	$txtpass = ($_POST['password']);

	$qry="SELECT * FROM login WHERE username = '" .$txtuid . "' AND password = '" .$txtpass ."'";
	//echo $qry;
	
	$result = $conn->query($qry);
	if ($result->num_rows ==1 ) 
	{
	    $row = $result->fetch_assoc();
        setcookie("USER",$row['username']);
		setcookie("USERTYPE",$row['usertype']);
		 
    	if($row['usertype']=='admin')
    		echo ("<script language=\"javascript\"> window.open(\"adminmain.php\",\"_self\"); </script>");
    	else
    		echo ("<script language=\"javascript\"> window.open(\"normalmain.php\",\"_self\"); </script>");	
	}
	else
	{
		echo ("<script>alert (\"Please, Correct Your Password.\"); history.go(-1) </script>  ");
			exit();
		
	}	
?>
</body>
</html>
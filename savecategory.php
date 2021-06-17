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

	$category = ($_POST['category']);
	//echo $category . "<BR>";
	
	$qry="SELECT * FROM categories WHERE username = '$username' and category='$category'";
	//echo $query;
	
	$result = $conn->query($qry);
	if ($result->num_rows==1 ) 
	{
	    echo ("<script>alert (\"Category is already exist...\"); history.go(-1) </script>  ");
			exit();	
	}
	else
	{
		//echo "Creating category...";
		//New category insertion logic
		$query="insert into categories values('$username','$category')";
 		$result=$conn->query($query);
 		if($result < 0)   
 		{  echo ("Category NOT-Created :::: UN-Successful"); }
		else
   		{
    	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Category Created :: Successfully...');
        		window.open(\"normalmain.php\",\"_top\"); </script>");
   		}
   	}
?>
</body>
</html>
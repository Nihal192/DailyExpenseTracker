<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>

<?php
	include("connection.inc");
     $username=$_COOKIE["USER"];
     $usertype=$_COOKIE["USERTYPE"];

     $qry="select category from categories where username='$username'";
	//echo $qry;
	$option="";
	if ($result= mysqli_query($conn, $qry)) 
	{
	    foreach ($result as $row)
	    { 
	    			$id= $row['category'];
	    			$option.='<option value="'.$id.'">'.$id.'</option>';
	    }
	}
 ?>

    <div class="box" style="height: 500px; transform: translate(-45%,-45%);">
      	<BR><BR>
      	<img src="delete.png" class="userimage" height="100px" width="100px" 
      	align="left">
      	<h2>DELETE CATEGORY</h2>

      	<form	<form action="savedeletecategory.php" method="post">
      		<h3 style="color: #aaa; letter-spacing: .2em;">Existing Categories:</h3>
      		<select name="categories" style="width:100%;">
      			<?php echo $option ?>
      		</select>
      		<BR><BR><BR>

      		
      		<BR><BR><BR>
      		<input type="submit" name="submit" value="D E L E T E  C A T E G O R Y">
      	</form>

</div>

   
</body>
</html>
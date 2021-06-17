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
      	<img src="category.png" class="userimage" height="100px" width="100px" 
      	align="left">
      	<h2>RENAME CATEGORY</h2>

      	<form	<form action="saverenamecategory.php" method="post">
      		<h3 style="color: #aaa; letter-spacing: .2em;">Existing Categories:</h3>
      		<select name="categories" style="width:100%;">
      			<?php echo $option ?>
      		</select>
      		<BR><BR><BR>

      		<input type="text" name="category" placeholder="Enter New Category-name" required="" style="margin-bottom:10px;">

      		<BR><BR><BR>
      		<input type="submit" name="submit" value="R E N A M E  C A T E G O R Y">
      	</form>

</div>

   
</body>
</html>>
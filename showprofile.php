<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>

<nav>
	<h1>Welcome: <?php echo $_COOKIE["USER"]; ?></h1>
</nav>
<BR>
<div class="divider"></div>


<?php
	include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];

	$qry="select * from personalinfo where username='$username'";
	//echo $qry;
	$result = $conn->query($qry);
	if ($result->num_rows==1 ) 
	{
	    $row = $result->fetch_assoc();
        ?>

		<div class="box" style="height: 660px; width: 550px; transform: translate(-45%,-40%);">
		<img src="user.png" class="userimage" height="70px" width="70px" align="left"><h2>USER PROFILE</h2><BR>
		<form action="updateprofile.php" method="post">
			
			<div class="datatable">
			<table >
	        <tr><td> User Name : </td> 
	        	<td> <?php echo $row['username']; ?></td></tr>
	        <tr><td> First Name : </td> 
	        	<td> <?php echo $row['firstname']; ?></td></tr>
	        <tr><td> Last Name : </td> 
	        	<td> <?php echo $row['lastname']; ?></td></tr>
	        <tr><td> Address : </td> 
	        	<td> <?php echo $row['address']; ?></td></tr>
	        <tr><td> City : </td> 
	        	<td> <?php echo $row['city']; ?></td></tr>
	        <tr><td> Pincode : </td> 
	        	<td> <?php echo $row['pincode']; ?></td></tr>
	        <tr><td> Country : </td> 
	        	<td> <?php echo $row['country']; ?></td></tr>
	        <tr><td> Email-ID : </td> 
	        	<td> <?php echo $row['email']; ?></td></tr>
	        <tr><td> Mobile : </td> 
	        	<td> <?php echo $row['mobile']; ?></td></tr>
	        <tr><td> Gender : </td> 
	        	<td> <?php echo $row['gender']; ?></td></tr>
	        <tr><td> Date of Birth : </td> 
	        	<td> <?php echo date("d-m-Y",strtotime($row['dob'])); ?></td></tr>
	        </table>
	    	</div>
	    	<BR>
			<input type="submit" name="submit" value="U P D A T E     P R O F I L E">
		</form>
		</div>

		
        <?php
       
    }    
?>

</body>
</html>
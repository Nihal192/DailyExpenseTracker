<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
	<link rel="stylesheet" type="text/css" href="radiobutton.css">
</head>
<body>

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
        
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $address = $row['address'];
        $city = $row['city'];
        $country = $row['country'];
        $email = $row['email'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        
        if($row['pincode']==0) 
        	$pincode="";
       	else
       		$pincode=$row['pincode'];
        
        if($row['mobile']==0) 
        	$mobile="";
       	else
       	    $mobile = $row['mobile'];
    }
?>


<div class="box" style="height: 660px; transform: translate(-45%,-45%); ">
	<img src="user.png" class="userimage" height="70px" width="70px" align="left"><h2>USER PROFILE</h2>

	<form action="saveupdateprofile.php" method="post">
	
	<input type="text" name="firstname" placeholder="Enter FirstName" required="" value="<?php echo $firstname;?>" 
	style="margin-bottom: 10px;">
	
	<input type="text" name="lastname" placeholder="Enter LastName" 
	required="" value="<?php echo $lastname;?>" 
	style="margin-bottom: 10px;">
	
	<input type="text" name="address" placeholder="Address: HouseNo, Society,Area" required="" value="<?php echo $address;?>" 
	style="margin-bottom: 10px;">
	
	<input type="text" name="city" placeholder="City" 
	required="" value="<?php echo $city;?>" 
	style="margin-bottom: 10px;">
	
	<input type="text" name="pincode" placeholder="Pincode" 
	required="" value="<?php echo $pincode;?>" 
	style="margin-bottom: 10px;">
	
	<input type="text" name="country" placeholder="country" 
	required="" value="<?php echo $country;?>" 
	style="margin-bottom: 10px;">
	
	<div class="dateformat">
		<table width="100%">
			<tr><td style="color:#aaa;">Birth Date: </td>
				<td style="vertical-align:bottom;"><input type="date" name="dob" value="<?php  echo date('Y-m-d',strtotime($dob)); ?>" placeholder="BirthDate" required=""></td>
			</tr>
		</table>
	</div>

	<div class="radiogroup" align="center" style="margin-bottom: 10px;">
		<label class="radio">
			<input type="radio" name="gender" value="male" 
				<?php if($gender=='male') 
						echo "checked";?>
			>
			Male<span></span>
		</label>

		<label class="radio">
			<input type="radio" name="gender" value="female"
			<?php if($gender=='female') 
						echo "checked";?>
			>
			Female<span></span>
		</label>
	</div>

	<input type="text" name="mobile" placeholder="Mobile Number" 
	required=""  value="<?php echo $mobile;?>" 
	style="margin-bottom: 10px;">
	
	<input type="text" name="email" placeholder="E-mail ID" 
	required="" value="<?php echo $email;?>" 
	style="margin-bottom: 10px;">
	
	<input type="submit" name="submit" value="UPDATE PROFILE">
	</form>
</div>

</body>
</html>
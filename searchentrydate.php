<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
	<link rel="stylesheet" type="text/css" href="radiobutton.css">
	<link rel="stylesheet" type="text/css" href="checkbox.css">
</head>
<body>

<?php
    include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
	$tablename = $username."entries";	
?>

    <div class="box" style="height:500px; transform:translate(-45%,-45%);">
	<img src="search5.png" class="userimage" height="120px" width="120px" align="left"><h2>SEARCH PAIDDATE</h2>

	<form action="searchresult.php" method="post">
	<BR><BR>

	<!-- 1.Item    2.Category    3.Price    4.EntryDate  -->
	<input type="hidden" name="searchby" value="4">


	<input type="label" placeholder="Select Minimum Date" readonly  style="margin-bottom:20px; border: none; color: #aaa; letter-spacing: .2em; 
		background: transparent; font-size: 16px;">

	<table width="100%">
			<tr><td style="color:#aaa;">Entry Date: </td>
				<td style="vertical-align:bottom;"><input type="date" name="searchvalue" value="<?php echo date('Y-m-d');?>"  required=""></td>
			</tr>
	</table>

	
	
	
	<label class="container">Item
  		<input type="checkbox" checked name="checklist[]" value="item">
  			<span class="checkmark"></span>
	</label>
	<label class="container">Category
	  <input type="checkbox" name="checklist[]" value="categories">
	  <span class="checkmark"></span>
	</label>
	<label class="container">Price
	  <input type="checkbox" name="checklist[]" value="price">
	  <span class="checkmark"></span>
	</label>
	<label class="container">Entry-Date
	  <input type="checkbox" name="checklist[]" value="entrydate">
	  <span class="checkmark"></span>
	</label>

	<BR><BR>
	<input type="submit" name="submit" value="S E A R C H">
	</form>
</div>

</body>
</html>
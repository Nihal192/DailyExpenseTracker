<?php 
	include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
?>

<script>
function myFunction() {
  window.print();
}
</script>

<!DOCTYPE html>
<html>
<head>
	<title>det</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
	<link rel="stylesheet" type="text/css" href="radiobutton.css">
</head>
<body>
<BR>
<button onclick="myFunction()" style="margin-left: 30px;">Print This Report</button>

<?php //First table logic ?>
<div class="EntryTableBox">
<TABLE style="padding-left: 30px; padding-top: 30px;">
	<TR style="background-color:#34495E">
		<th>USERNAME</th>
		<th>USERTYPE</th>
		<th>STATUS</th>
	</tr>
	<?php
	$qry="select * from login where usertype = 'normal'";
	//echo $qry;
	$result= mysqli_query($conn,$qry);
	while ($row = $result->fetch_assoc())
	 {
	   ?>
	      <tr align="Center">
	      	<td><?php echo $row['username']; ?></td>
	      	<td><?php echo $row['usertype']; ?></td>
	      	<td><?php echo $row['status']; ?></td>
	      </tr>
	     <?php     
	   }
	   ?>
</Table>
</div>

</body>
</html>

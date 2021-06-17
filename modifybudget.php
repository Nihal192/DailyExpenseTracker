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
	//$tablename = $username."entries";

	function changeformat(&$var) // yyyy-mm-dd :-> dd-mm-yyyy
	{
       $year = substr($var, -10,4);
       $month = substr($var, -5,2);
       $day = substr($var, -2,2);
       $var = $day . "-" . $month . "-" . $year;
	}


	$qry="select * from budgetlimit where username='$username' order by year desc,month desc";
	//echo $qry;
	$result= $conn->query($qry);
		
?>

    
	<BR>
	<div class="EntryTableBox">
	<!-- <input type="hidden" name="recid" value="<?php echo $recid; ?>"> -->
	<TABLE style="padding-left: 30px; padding-top: 30px;">
	<TR  style="background-color:#34495E">
		<th>DELETE</th>
		<th>EDIT</th>
		<th>CATEGORY</th>
		<th>MONTH</th>
		<th>YEAR</th>
		<th>LIMIT AMOUNT</th>
	</tr>

	<?php
	while ($row = $result->fetch_assoc())
	 {
	   if(!empty($row))
	   {
	    ?>
	      <tr align="Center">
	      	<td>
	      	<a href="savedeletebudget.php?recid=<?php echo "$row[recid]"; ?>">
	      	<img style="padding-left: 20px;" src="delete.png" height="40" width="40">
	      	</a>
	      	</td>
	      	<td >
	      	<a href="saveeditbudget.php?recid=<?php echo "$row[recid]"; ?>">
	      	<img style="padding-left: 5px;" src="edit1.png" height="40" width="40">
	      	</a>
	      	</td>
	      	<td><?php echo $row['category']; ?></td>
	      	<td><?php echo $row['month']; ?></td>
	      	<td><?php echo $row['year']; ?></td>
	      	<td><?php echo $row['limitamount']; ?></td>
	      </tr>
	     <?php
	     }
	   }
	   ?>
	</Table>
	</div>
	
	


</body>
</html>
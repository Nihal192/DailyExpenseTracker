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
	$tablename = $username."entries";

	$searchby = $_POST['searchby'];
	
	if($searchby == 1)
	{   $searchvalue = "%" . $_POST['searchvalue']. "%";
		$search = " where item like '" . $searchvalue . "' ";
	}
	else if($searchby == 2)
	{   $searchvalue = "%" . $_POST['searchvalue']. "%";
		$search = " where categories like '" .$searchvalue . "' ";
	}
	else if($searchby == 3)
	{   $searchvalue =  $_POST['searchvalue'];
		$search = " where price >= " . $searchvalue ;
	}
	else if($searchby == 4)
	{
		$searchvalue =  $_POST['searchvalue'];
		$search = " where entrydate >= '" . $searchvalue . "' ";
	}
	else
		;
	//$qry="";

	function changeformat(&$var) // yyyy-mm-dd :-> dd-mm-yyyy
	{
       $year = substr($var, -10,4);
       $month = substr($var, -5,2);
       $day = substr($var, -2,2);
       $var = $day . "-" . $month . "-" . $year;
	}

	if(!empty($_POST['checklist'])) 
	{
		$checkedcount = count($_POST['checklist']); //counting checked elements. 

		if($checkedcount==1)
		{ foreach($_POST['checklist'] as $selected) 
			$qry = "select recid," . $selected ." from $tablename $search order by recid desc";
		}

		else {	$qry = "select recid,";
				$i=1;
				// Loop to store and display values of individual checked checkbox.
				foreach($_POST['checklist'] as $selected) 
				{
					if($i==1)
						$qry= $qry . $selected;
					else if($i==$checkedcount)
						$qry = $qry.",".$selected . " from $tablename $search order by recid desc";
					else
						$qry = $qry . "," . $selected;

					$i=$i+1;
				}
			}
	}
?>
    
	<BR>
	<div class="EntryTableBox">
	<!-- <input type="hidden" name="recid" value="<?php echo $recid; ?>"> -->
	<TABLE style="padding-left: 30px; padding-top: 30px;">
	<TR  style="background-color:#34495E">
		<th>DELETE</th>
		<th>EDIT</th>
		<?php foreach($_POST['checklist'] as $selected)
			  {echo "<th>$selected</th>";}
		?>
	</tr>

<?php
	//echo $qry;
	$result=$conn->query($qry);
	while ($row = $result->fetch_assoc())
	 {
	   if(!empty($row))
	   {
	    ?>
	      <tr align="Center">
	      	<td>
	      	<a href="savedeleteentry.php?recid=<?php echo "$row[recid]"; ?>">
	      	<img style="padding-left: 20px;" src="delete.png" height="40" width="40">
	      	</a>
	      	</td>
	      	<td >
	      	<a href="saveeditentry.php?recid=<?php echo "$row[recid]"; ?>">
	      	<img style="padding-left: 5px;" src="edit1.png" height="40" width="40">
	      	</a>
	      	</td>
	      	<?php
		      	foreach($_POST['checklist'] as $selected)
				{ if(strcmp($selected,"entrydate")==0)
					{changeformat($row['entrydate']);
					echo "<th>" . $row['entrydate']. "</th>";}
				  else
					echo "<th>" . $row[$selected]. "</th>";
				}
			?>
	      </tr>
	     <?php
	     }
	   }
	   ?>
	</Table>
	</div>
</body>
</html>



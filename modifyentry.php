<!DOCTYPE html>
<html>
<head>
	<title>Daily expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
	<link rel="stylesheet" type="text/css" href="radiobutton.css">
</head>
<body>
<?php 
     include ("connection.inc");
     $username = $_COOKIE["USER"];
     $usertype = $_COOKIE["USERTYPE"];
     $tablename= $username."entries";

     function changeformat(&$var)
     {
     	$year = substr($var,-10,4);
     	$month= substr($var, -5,2);
     	$day= substr($var, -2,2);
     	$var=$day . "-" .$month . "-". $year;
     }


     $qry="select * from $tablename ORDER by recid DESC";
     $result=$conn->query($qry);
     ?>


     <br>
     <div class ="EntryTableBox">
     	<TABLE style="padding-left: 30px; padding-top:30px;">
     		<TR style="background-color: #34495E">
     			<th>DELETE</th>
     			<th>EDIT</th>
     			<th>REC-ID</th>
     			<th>ITEM</th>
     			<th>CETEGORY</th>
     			<th>PRICE</th>
     			<th>ENTRY-DATE</th>
     		</TR>
<?php
    while($row=$result->fetch_assoc())
    {
    	if(!empty($row))
    	{
    		?>
    		<tr align="Center">
    			<td>
    				<a href="savedeleteentry.php?recid=<?php echo "$row[recid]";?>">
    			    <img style="padding-left: 5px;"src="delete.png" height="40"
                    width="40">
    				</a>
                </td>
                <td>
                    <a href="saveeditentry.php?recid=<?php echo "$row[recid]";?>">
                        <img style="padding-left: 5px;"src="edit1.png"height="40"
                    width="40">
                    </a>
    			</td>
                <td><?php echo $row['recid']; ?></td>
                <td><?php echo $row['item']; ?></td>
                <td><?php echo $row['categories']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php changeformat($row['entrydate']); echo  $row['entrydate']; ?></td>
            </tr>
            <?php
        }
    }
    ?>
    	

     	</TABLE>
     </div>



</body>
</html>
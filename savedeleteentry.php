<?php
$recid=intval($_GET['recid']);

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="rightsidecss.css">
     <link rel="stylesheet" type="text/css" href="radiobutton.css">


</head>
<body>
     <?php
       include("connection.inc");
     $username=$_COOKIE["USER"];
     $usertype=$_COOKIE["USERTYPE"];
     $tablename=$username."entries";


     $qry="select * from $tablename where recid=$recid";
     echo $qry;
     $result=$conn->query($qry);
     $row=$result->fetch_assoc();

     $item=$row['item'];
     $categories=$row['categories'];
     $price=$row['price'];
     $entrydate=$row['entrydate'];
 ?>

 <div class="box" style="height: 500px; transform: translate(-45%,-45%);">
 	<img src="delete.png"  class="userimage" height="100px" width="100px" align="left">
 	<h2>DELETE ENTRY</h2>

 	<form action="deleteentryfinally.php" method="post">
 		<BR>

 		<input type="hidden" name="recid" value="<?php echo $recid; ?>">

				<input type="text" readonly value="<?php echo $item;?>"
				   style ="margin-bottom: 20px;">

				   <input type="text" readonly value="<?php echo $categories;?>"
				   style ="margin-bottom: 20px;">

				   <input type="text" readonly value="<?php echo $price;?>"
				   style ="margin-bottom: 20px;">

				   <input type="text" readonly value="<?php echo $entrydate;?>"
				   style ="margin-bottom: 20px;">

				   <BR><BR>
				   <input type="submit" name="submit" value="DELETE FINALLY">

				</form>
			</div>

</body>
</html>
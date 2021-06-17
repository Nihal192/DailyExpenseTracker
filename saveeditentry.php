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

     $qry = "select category from categories where username='$username'";

     $option="";
     if($result = mysqli_query($conn ,$qry))
     {
        foreach($result as $row)
         {
            $id = $row['category'];
            if(strcmp($id, $categories)==0)
            $option.='<option value="'.$id.'"selected>' .$id.'</option>';
            else
                $option.='<option value="'.$id.'">'.$id.'</option>';
        }
     }


 ?>

 <div class="box" style="height: 500px; transform: translate(-45%,-45%);">
 	<img src="edit1.png"  class="userimage" height="100px" width="100px" align="left">
 	<h2>MODIFY ENTRY</h2>

 	<form action="editentryfinally.php" method="post">
 		<BR>

 		<input type="hidden" name="recid" value="<?php echo $recid; ?>">

                <input type="text" name="item" placeholder="Enter Item name" required="" style="margin-bottom:20px;" value="<?php echo $item;?>">

                <h3 style="color:#aaa; letter-spacing: .2em;">Select Category:</h3>
                <select name="category" required="" style="width:100%; margin-bottom:10px">
                    <?php echo $option ?>
                </select>
                <BR><BR>
                <input type="text" name="price" placeholder="Amount" required="" style="margin-bottom:10px;" value="<?php echo $price;?>">
                <BR><BR>

                <table width="100%">
                    <tr><td style="color:#aaa;">Entry Date</td>
                        <td style="vertical-align:bottom;"><input type="date" name="entrydate" value="<?php echo $entrydate;?>" required=""></td>
                    </tr>
                </table>
            <BR><BR>
            <input type="submit" name="submit" value="UPDATE FINALLY">
				</form>
			</div>

</body>
</html>
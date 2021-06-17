<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
       include("connection.inc");
       $username=$_COOKIE["USER"];
        $usertype=$_COOKIE["USERTYPE"];
         $tablename=$username."entries";


         $qry="select max(recid) from $tablename";
         $result=$conn->query($qry);
         if($result->num_rows==1)
         {
         	$row=$result->fetch_assoc();
         	$recid=$row['max(recid)'];
         	$recid=$recid+1;
         }
         else
         	$recid=1;


        $item=($_POST["item"]);
        $category=($_POST['category']);
        $price=($_POST['price']);
        $entrydate=($_POST['entrydate']);
        $entrydate=date("Y-m-d",strtotime($entrydate));


        $qry="insert into $tablename values($recid,'$item','$category',$price,'$entrydate')";
       // echo $qry;
        $result=$conn->query($qry);
        if($result<0)
        {
        	echo("Record is NOT-Inserted:::: UN-Successful");
        }
        else
        {
        	 echo("<script LANGUAGE='JavaScript'>
        	 	window.alert('Record is inserted :: Successfully...');
        	 	window.open(\"normalmain.php\",\"_top\");</script>");
        }
?>







</body>
</html>
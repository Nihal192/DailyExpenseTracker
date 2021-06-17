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
     $categories=($_POST['categories']);
     $category=($_POST['category']);
     $tablename=$username."entries";

    $qry="SELECT * FROM categories WHERE username='$username' and category='$category'";

     $result =$conn->query($qry);
     if($result->num_rows==1)
     {
     	echo("<script>alert(\"Category is already exist....\");history.go(-1)
     		</script>");
     	exit();
     }
    else{
         $qry="update $tablename set categories='$category' where categories='$categories'";
         
         $result=$conn->query($qry);


         $query="update categories set category='$category' where username='$username' and category='$categories'";
         $result=$conn->query($query);

       if($result < 0)
       {
       	echo("Category NOT-Renamed :::: UN-Successful");
       }
       else
       {
       	echo("<script LANGUAGE='JavaScript'>
       		window.alert('Category Renamed :: Successfully...');
       		window.open(\"normalmain.php\",\"_top\"); </script>");
       }

    }
    ?>
</body>
</html>
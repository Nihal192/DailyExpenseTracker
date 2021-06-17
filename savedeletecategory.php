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
    // $categories=($_POST['categories']);
     $category=($_POST['categories']);
     $tablename=$username."entries";

    $qry="SELECT * FROM $tablename WHERE  categories='$category'";

     $result =$conn->query($qry);
     if($result->num_rows>=1)
     {
      echo("<script>alert(\"Category cannot be deleted due to previous entries...\");history.go(-1)
        </script>");
      exit();
     }
    else{
         


         $query="delete from  categories where username='$username' and category='$category'";
         $result=$conn->query($query);

       if($result < 0)
       {
        echo("Category is NOT-Deleted :::: UN-Successful");
       }
       else
       {
        echo("<script LANGUAGE='JavaScript'>
          window.alert('Category DELETED :: Successfully...');
          window.open(\"normalmain.php\",\"_top\"); </script>");
       }

    }
    ?>
</body>
</html>
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

  $currentyear=date("Y"); 
?>

<div class="box" style="height:500px; transform:translate(-45%,-45%);">
<img src="itemwise.png" class="userimage" height="200px" width="280px" align="left" style="margin-left:0px;">
<BR><h2>YEARLY  & <BR> ITEM-WISE REPORT</h2>

<form action="showrepitemwise.php" method="post">

<input type="text" name="item" placeholder="Enter Item Name" required="" 
  style="margin-bottom:20px;">

<input type="label" placeholder="Select  Year :" readonly  
       style="margin-bottom:20px; border: none; color: #fff; letter-spacing: .2em;
    background: transparent; font-size: 20px;margin-left: 40px;">
  
<select name="year" style="margin-left: 100px;">
<?php
for($i=$currentyear; $i>= $currentyear-3; $i=$i-1)
  echo "<option value='$i'>$i</option>";
?>
</select>
<BR><BR>
<input type="submit" name="submit" value="S H O W  R E P O R T">
</form>
</div>

</body>
</html>
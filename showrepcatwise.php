<!DOCTYPE html>
<html>
<head>
  <title>Daily Expense Tracker</title>
  <link rel="stylesheet" type="text/css" href="rightsidecss.css">
  <link rel="stylesheet" type="text/css" href="radiobutton.css">
  <link rel="stylesheet" type="text/css" href="checkbox.css">
</head>
<body>

<script>
function myFunction() {
  window.print();
}
</script>
<BR>
<button onclick="myFunction()" style="margin-left: 30px;">Print This Report</button>

<?php 
  include ("connection.inc");
  $username=$_COOKIE["USER"];
  $usertype=$_COOKIE["USERTYPE"];
  $tablename = $username."entries";
  $year = $_POST['year'];
  //$year=date("Y");
  $month=12;
  //$month = date('m'); 
  echo $year . $month;

  //to identify each categories created by current user.
  $qry="select category from categories where username='$username'";
  $result=$conn->query($qry);
  for($i=0;$row=$result->fetch_assoc();$i=$i+1)
  {
    $cat[$i]=$row['category'];
  }
  $totalcategories = $i;
  
  
  //Creating month name array; 
  $display_months = array(1 => 'JAN', 2 => 'FEB', 3 => 'MAR', 4 => 'APR', 5 => 'MAY', 6 => 'JUN', 7 => 'JUL', 8 => 'AUG', 9 => 'SEP', 10 => 'OCT', 11 => 'NOV', 12 => 'DEC');
 
  //Preparing Table ?>
  <div class="EntryTableBox">
  <TABLE style="padding-left: 30px; padding-top: 30px;">
    <TR style="background-color:#34495E" >
      <th style="text-align:center;" colspan="<?php echo $month+1; ?>" >REPORT OF YEAR : <?php echo $year; ?></th>
    </tr>
    <TR style="background-color:#34495E">
    <th>CATEGORY</th>
    <?php for($i=1;$i<=$month;$i++)
        echo "<TH>" . $display_months[$i]."</TH>"; //prints JAN,FEB,MAR,... ?>
    </tr>

  <?php
  //loop for each category of current user...
  for($i=0;$i<$totalcategories;$i=$i+1)
  {
          echo "<TR><TD>". $cat[$i]."</TD>";  //gives the category's name
          for($j=1;$j<=$month;$j++)
          {
          $query_date = $year . "-" . $j ."-01";
          $firstdate = date('Y-m-01', strtotime($query_date));
          $lastdate = date('Y-m-t', strtotime($query_date));
        
          $qry1="select sum(price) as amount from $tablename where entrydate >= '$firstdate' and entrydate <='$lastdate' and categories = '$cat[$i]'";
           //echo $qry1 ."<BR>";
           $result1= $conn->query($qry1);
           while ($row1 = $result1->fetch_assoc())
              {
                //echo '<a href="Test.html?ID=' . $i . '"> Sample text </a>';
                echo '<TD><a href="showrepcatewisemonthly.php?categories='.$cat[$i].'&month='.$j.'&year='.$year.'&total='.$row1['amount'].'">'.$row1['amount'].'</TD>';
              }
          }
          echo "</TR>";
  }
  echo "</table>";
?>
</div>
</body>
</html>
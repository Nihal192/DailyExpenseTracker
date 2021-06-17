<!DOCTYPE html>
<html>
<head>
  <title>ROJNISHI</title>
  <link rel="stylesheet" type="text/css" href="rightsidecss.css">
  <link rel="stylesheet" type="text/css" href="radiobutton.css">
</head>
<body>

<?php
  include ("connection.inc");
  $username=$_COOKIE["USER"];
  $usertype=$_COOKIE["USERTYPE"];
  $tablename = $username."entries";

  $item = $_POST['item'];
  $year = $_POST['year'];
  
  //echo $item . "<BR>" .$year;

 //Creating month name array; 
  $display_months = array(1 => 'JAN', 2 => 'FEB', 3 => 'MAR', 4 => 'APR', 5 => 'MAY', 6 => 'JUN', 7 => 'JUL', 8 => 'AUG', 9 => 'SEP', 10 => 'OCT', 11 => 'NOV', 12 => 'DEC');
 
  function changeformat(&$var) // yyyy-mm-dd :-> dd-mm-yyyy
  {
       $year = substr($var, -10,4);
       $month = substr($var, -5,2);
       $day = substr($var, -2,2);
       $var = $day . "-" . $month . "-" . $year;

  }


?>


  <div class="EntryTableBox">
  <TABLE style="padding-left: 30px; padding-top: 30px;">
    <TR style="background-color:#34495E" >
      <th style="text-align:center;" colspan="13" >REPORT OF YEAR : <?php echo $year. " with ".$item; ?></th>
    </tr>
    <TR style="background-color:#34495E">
    <th>ITEM-NAME</th>
    <?php for($i=1;$i<=12;$i++)
        echo "<TH>" . $display_months[$i]."</TH>"; //prints JAN,FEB,MAR,... ?>
    </tr>

  <?php
          echo "<TR><TD>". $item."</TD>";  //gives the category's name
          for($j=1;$j<=12;$j++)
          {
          $query_date = $year . "-" . $j ."-01";
          $firstdate = date('Y-m-01', strtotime($query_date));
          $lastdate = date('Y-m-t', strtotime($query_date));
        
          $qry1="select sum(price) as amount from $tablename where entrydate >= '$firstdate' and entrydate <='$lastdate' and item = '$item'";
           //echo $qry1 ."<BR>";
           $result1= $conn->query($qry1);
           while ($row1 = $result1->fetch_assoc())
              {
                //echo '<a href="Test.html?ID=' . $i . '"> Sample text </a>';
                echo '<TD><a href="showrepitemwisemonthly.php?item='.$item.'&month='.$j.'&year='.$year.'&total='.$row1['amount'].'">'.$row1['amount'].'</TD>';
              }
          }
          echo "</TR>";
  
  echo "</table>";
?>
</div>

</body>
</html>
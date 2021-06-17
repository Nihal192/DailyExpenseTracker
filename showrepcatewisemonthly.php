<?php 
	include ("connection.inc");
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
	$tablename = $username."entries";
	$month=$_GET['month'];
	$year=$_GET['year'];
	$categories=$_GET['categories'];
	$total=$_GET['total'];
	//echo $month . $year .$categories. $total;

	$query_date = $year . "-" . $month ."-01";
	$firstdate = date('Y-m-01', strtotime($query_date));
	$lastdate = date('Y-m-t', strtotime($query_date));
	//echo "<BR>" . $firstdate;
	//echo "<BR>" . $lastdate;

	function changeformat(&$var) // yyyy-mm-dd :-> dd-mm-yyyy
	{
       $year = substr($var, -10,4);
       $month = substr($var, -5,2);
       $day = substr($var, -2,2);
       $var = $day . "-" . $month . "-" . $year;
	}
	/*select categories,sum(price) as amount from hiteshentries where entrydate >= '2019-12-01' and entrydate <='2019-12-31' GROUP by categories
	=======================================================================
	select categories,sum(price) as amount from $tablename where entrydate >= '$firstdate' and entrydate <='$lastdate' GROUP by categories */
	
	//piechart
	$qry1="select categories,sum(price) as amount from $tablename where entrydate >= '$firstdate' and entrydate <='$lastdate' GROUP by categories";
	//echo $qry1;
	$result1= $conn->query($qry1);

	//barchart
	$qry2="select categories,sum(price) as amount from $tablename where entrydate >= '$firstdate' and entrydate <='$lastdate' GROUP by categories";
	//echo $qry1;
	$result2= $conn->query($qry2);
?>

<script>
function myFunction() {
  window.print();
}
</script>

<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
	<link rel="stylesheet" type="text/css" href="radiobutton.css">
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	 <script type="text/javascript">
	 	google.charts.load('current',{'packages':['corechart']});
	 	google.charts.setOnLoadCallback(drawChart1);
	 	google.charts.setOnLoadCallback(drawChart2);
	 	function drawChart1()
	 	{
	 		var data = google.visualization.arrayToDataTable([
	 			['Category','Amount'],
	 			<?php 
				while ($row1 = $result1->fetch_assoc())
				{
	 			 echo "['".$row1['categories']."',".$row1['amount']."],";
				}
			 	?>
			 	]);
			var options = {
				 title: 'Comparision:this Category in this Month',
				 backgroundColor: { fill:'transparent' },
				 //legend: {textStyle: {color: 'white', fontSize: 14}}
				 legendTextStyle: { color: '#CCC' },
    			 titleTextStyle: { color: '#CCC' },
				 //'is3D':true
				 };
			 var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			 chart.draw(data,options);
	 	}


	 	function drawChart2()
	 	{
	 		var data = new google.visualization.DataTable();
        	data.addColumn('string', 'categories');
        	data.addColumn('number', 'Amount');
        	data.addRows([
         	<?php 
				while ($row2 = $result2->fetch_assoc())
				{
	 			 echo "['".$row2['categories']."',".$row2['amount']."],";
				}
			?>
        	]);

		 	var barchart_options = {title:'Comparision:this Category in this Month',
                        backgroundColor: { fill:'transparent'},
				 		legendTextStyle: { color: '#CCC' },
    			 		titleTextStyle: { color: '#CCC' },
    			 		};
               
        	var barchart = new google.visualization.BarChart(document.getElementById('barchart'));
        		barchart.draw(data, barchart_options);
	 	}
	 </script>
</head>
<body>
<BR>
<button onclick="myFunction()" style="margin-left: 30px;">Print This Report</button>

<?php //Records table logic ?>
<div class="EntryTableBox">
<TABLE style="padding-left: 30px; padding-top: 30px;">
	<TR style="background-color:#34495E">
		<th colspan="4" style="text-align: center;"><?php echo 'Total Expence is :'. $total;?></th>
	</tr>
	<TR style="background-color:#34495E">
		<th>ITEM</th>
		<th>CATEGORY</th>
		<th>PRICE</th>
		<th>ENTRY-DATE</th>
	</tr>
	<?php
	$qry="select * from $tablename where entrydate >= '$firstdate' and entrydate <='$lastdate' and categories='$categories' order by recid desc";
	//echo $qry;
	$result= mysqli_query($conn,$qry);
	while ($row = $result->fetch_assoc())
	 {
	   ?>
	      <tr align="Center">
	      	<td><?php echo $row['item']; ?></td>
	      	<td><?php echo $row['categories']; ?></td>
	      	<td><?php echo $row['price']; ?></td>
	      	<td><?php changeformat($row['entrydate']); echo $row['entrydate']; ?></td>
	      </tr>
	     <?php     
	   }
	   ?>
</Table>
</div>

<table style="margin-left: 30px; width: 700px;">
      <tr><td>
      	<div id="piechart" style="width:700px; height: 500px; border: 1px solid #ccc"></div>
      </td></tr>
      <tr><td>
      	<div id="barchart" style="width:700px; height: 500px; border: 1px solid #ccc"></div>
      </td></tr>
</table>

</body>
</html>

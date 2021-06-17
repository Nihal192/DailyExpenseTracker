<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">

	<style>
		img { 	border: 1px solid #ddd;
  				border-radius: 10px;
  				padding: 5px;
  				width: 250px;
  				height: 200px;
  				margin-right: 10px; 
  				margin-left: 10px;
  			}
  		
	</style>
	
</head>
<body>

<nav>
	<h1 style="color:orange;">Welcome: <?php echo $_COOKIE["USER"]; ?></h1>
</nav>
<BR>
<div class="divider"></div>
<BR><BR>

	<img src="graph1.png" alt="Monthly" style="float:left;margin-left: 150px;">
	
	<img src="graph2.png" alt="Monthly" style="float:left;">
	
	<img src="graph3.png" alt="Monthly" style="float:left;">

	<img src="graph4.png" alt="Monthly" style="margin-top: 20px; margin-left: 150px; width: 810px; height: 300px;">
	
</body>
</html>
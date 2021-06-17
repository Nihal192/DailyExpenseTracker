<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- https://fontawesome.com/v4.7.0/icons/ -->
</head>
<body>

<nav class="mainmenu">	
    <ul class="submainmenu">
        <li><a href="normalmain.php" target="right"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Profile<span class="downarrow"></span></a>
            <ul>
                <li><a href="showprofile.php" target="rightside">Update</a></li>
            </ul>
        </li>
    	<li><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Entry<span class="downarrow"></span></a>
    		<ul>
    			<li><a href="newentry.php" target="rightside">New</a></li>
    			<li><a href="modifyentry.php" target="rightside">Modify-Delete</a></li>
    		</ul>
    	</li>
    	<li><a href="#"><i class="fa fa-bars" aria-hidden="true"></i> Category<span class="downarrow"></a>
    		<ul>
    			<li><a href="addcategory.php" target="rightside">Add</a></li>
    			<li><a href="renamecategory.php" target="rightside">Rename </a></li>
                <li><a href="deletecategory.php" target="rightside">Delete </a></li>
    		</ul>
    	</li>
    	<li><a href="#"><i class="fa fa-search"></i> Search Record<span class="downarrow"></a>
    		<ul>
    			<li><a href="Searchitem.php" target="rightside">Item</a></li>
    			<li><a href="searchcategory.php"  target="rightside">Category</a></li>
    			<li><a href="searchpaidamount.php" target="rightside">Paid Amount</a></li>
    			<li><a href="searchentrydate.php"  target="rightside">Paid Date</a></li>
    		</ul>	
    	</li>
    	<li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i> Budget Limit<span class="downarrow"></a>
			<ul>
    			<li><a href="addbudget.php"  target="rightside">Add</a></li>
    			<li><a href="modifybudget.php"  target="rightside">Modify-Delete</a></li>
    		</ul>
    	</li>
    	<li><a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i> Report<span class="downarrow"></a>
    		<ul>
    			<li><a href="repdaily.php"  target="rightside">Daily</a></li>
    			<li><a href="repmonthly.php"  target="rightside">Monthly</a></li>
    			<li><a href="repyearly.php"  target="rightside">Yearly</a></li>
    			<li><a href="repdaterange.php"  target="rightside">Date-Range</a></li>
    			<li><a href="repcatwise.php"  target="rightside">Category-Wise</a></li>
    			<li><a href="repitemwise.php"  target="rightside">Item-Wise</a></li>
    		</ul>
    	</li>
    	<li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Password<span class="downarrow"></a>
    		<ul>
    			<li><a href="changepassword.php" target="rightside">Change</a></li>
    		</ul>
    	</li>
    	<li><a href="logout.php"><em class="fa fa-power-off"></em> Logout</a></li>
    </ul>
</nav>


</body>
</html>
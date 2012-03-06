<?php
include('../lib/common.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<link href="pics/homescreen.gif" rel="apple-touch-icon" />
<meta name="viewport" content="width=device-width,user-scalable=no" />
<link href="../css/core.css" rel="stylesheet" media="screen" type="text/css" />
<link href="../css/news.css" rel="stylesheet" media="screen" type="text/css" />
<script src="../javascript/functions.js" type="text/javascript"></script>
<title>Meredith News</title>
</head>

<body onload="scrollTo(0,1);">
<div id="wrapper">
	<div class="toolbar">
            <div id="leftbutton"><a href="enewsheadlines.php" onClick="history.back();return false;">Back</a></div>
			<div id="rightbutton"><a href="http://m.meredith.edu">Home</a></div>
            <h1>News</span></h1>
	</div>  

<?
 $id = $_GET["id"];
 //Test the database connection 
 $db = mysql_connect('localhost:3305', 'enews', '3h32w');

  if (!$db)
  {
     echo "<font face=Verdana,Arial,sans-serif size=2 color=#FF0000>Error: Could not connect to database.  Please try again later.</font>";
     exit;
  }

mysql_select_db("enews");
//--------------------------------------------------------------------  
//----------     retrieves infromation from enews table     ----------
//--------------------------------------------------------------------
$sql = "SELECT * FROM enews07 WHERE id = '$id'";
			  				  
$result = mysql_query($sql);
$num_results = mysql_num_rows($result);
$row = mysql_fetch_array($result);
	
echo "<div id='container'><div class='storyphoto'><br><img src='../images/MeredithCollege/enews/".$row["Full_Photo"]."'><div class='clear'></div></div></div>";
?>


<div id="footer" align="center"><br>
	<a href="../social/facebook.php"><img src="../images/MeredithCollege/facebook_black_f.png" width="11" height="22" hspace="10" alt="Facebook" /></a>
	<a href="../social/twitter.php"><img src="../images/MeredithCollege/tweetie.png" width="25" height="22" hspace="10" alt="Twitter" /></a>
	<a href="http://www.youtube.com/meredithcollege"><img src="../images/MeredithCollege/youtube_black.png" width="19" height="22" hspace="10" alt="YouTube" /></a>
	<br><br>
	Meredith College • Raleigh, NC • <a href="../about/about.php">About This Site<br/></a><br>
</div>

</div>

</body>
</html>

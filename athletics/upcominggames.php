
<?
date_default_timezone_set( "America/New_York"  );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width,user-scalable=yes" />
<link href="../css/core.css" rel="stylesheet" media="screen" type="text/css" />

<!-- Set the .png file that you want to use as a iPhone springboard icon -->
<link rel="apple-touch-icon" href="robert.png"/>

<script src="../javascript/functions.js" type="text/javascript"></script>
<title>Meredith College Mobile Web</title>
<meta content="keyword1,keyword2,keyword3" name="keywords" />
<meta content="Description of your page" name="description" />

<!-- GOOGLE ANALYTICS CODE -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18231902-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body onload="scrollTo(0,1);">
<div class="toolbar">
			<div id="leftbutton"><a href="./athletics.html">Back</a></div>
                        <div id="rightbutton"><a href="../index.php">Home</a></div>
			<h1>Sports Schedule</span></h1>
</div>  


<?

$db = mysql_connect("localhost", "athletics", "q5yo358dw");
if (!$db)
{
	echo "<font face=Verdana,Arial,sans-serif size=2 color=#FF0000>Error: Could not connect to database.  Please try again later.</font>";
	exit;
} 

// select db
$db_selected = mysql_select_db("athletics", $db);

if (!$db_selected)
{   die ("Can\'t use database : " . mysql_error());  }
else
{
	$date = mktime(0,0,0,date("m"),date("d"),date("Y"));
	$ActualDate = (date("Y-m-d", $date));
		
	$query = "SELECT Sport, GameDate, TimeResults, Opponent, id FROM schedulessoccer WHERE GameDate >= '$ActualDate' ORDER BY GameDate ASC, TimeResults ASC";
	$query_result = mysql_query($query);
	$num_results = mysql_num_rows($query_result);

	$bgcolor = "#CCCCCC";
	echo "<div id='copyBase'><ul class='edgetoedge'><br>";
	//echo "<div id='copyBase'><ul class='nav'>";

	If ($num_results > 15){	
		
			for ($i=0; $i < 30; $i++)
			{
				$row = mysql_fetch_array($query_result);
				
				$GameDate 		=   $row["GameDate"];
				$TimeResults	=	$row["TimeResults"];
				$Opponent		=	$row["Opponent"];
				$Sport			=	$row["Sport"];
				
				$DisplayDate = (date("l", $GameDate));
				
				If ($NextGameDate <> $GameDate)
				{
					//echo "<li class='sep'><b>" . date("l, M j", strtotime($GameDate)) . "</b></li>";
					echo "<li class='sep'>" . date("l, M j", strtotime($GameDate)) . "</li>";
					//echo "<li><b>" . date("l, M j", strtotime($GameDate)) . "</b><br>";
				}
				
				//echo "<div class='label'>" . $TimeResults . "</div><div class='value'>" . $Sport . "&nbsp;" . $Opponent . "</div></li>";
				echo "<li><div class='label'>" . $TimeResults . "</div><div class='value'>" . $Sport . "&nbsp;" . $Opponent . "</div></li>";
				$NextGameDate	=   $row['GameDate'];
				$i++;
			}
		echo "</ul></div>";
		}
		ELSE{
			while (! $result->EOF) {
			
				$GameDate 		=   $row["GameDate"];
				$TimeResults	=	$row["TimeResults"];
				$Opponent		=	$row["Opponent"];
				$Sport			=	$row["Sport"];
				
				$DisplayDate = (date("l", $GameDate));				
				
				If ($NextGameDate <> $GameDate){
					print "<tr>";
					print "<td colspan=2 height=20 bgcolor=#CCCCCC><font size=2 face=arial>&nbsp;<b>" . date("l, M j", strtotime($GameDate)) . "</b></font></td>";
					print "</tr>";

				}
				  
				print "<tr>";
				print "<td height=25 bgcolor=#FFFFFF><font color=black face=arial size=2>&nbsp;" . $TimeResults . "</font></td>";
				print "<td height=25 bgcolor=#FFFFFF><font color=#990000 face=arial size=2>&nbsp;" . $Sport . " - " . $Opponent . "</font></td>";
				print "</tr>";
				
				$NextGameDate	=   $row["GameDate"];
				
				//$result->moveNext();
				
			}
		
		}
		
		
	}
?>  


<div id="footer" align="center"><br><strong>Meredith College</strong><br>3800 Hillsborough Street | Raleigh, NC 27607<br><a 
href="../about/about.php" color="white"><strong>About This Site</strong></a></div>

</body>

</html>











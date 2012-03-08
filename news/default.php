<?			
include('../lib/common.php');

//SubmitterType IS A VARIABLE CONTAINING THE CATEGORY OF NEWS ARTICLES SELECTED BY THE USER IN A DROPDOWN BOX
//IF SubmitterType HAS NO VALUE (I.E. THE FIRST VISIT TO THIS PAGE), THEN "HEADLINES" SHOULD BE THE NEWS CATEGORY DISPLAYED
if (isset($_POST['SubmitterType'])) 
	$newstype = $_POST["SubmitterType"]; 	
else $newstype = "Headlines"; 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
<link href="pics/homescreen.gif" rel="apple-touch-icon" />
<meta name="viewport" content="width=device-width,user-scalable=no" />
<link href="../css/core.css" rel="stylesheet" media="screen" type="text/css" />
<link href="../css/news.css" rel="stylesheet" media="screen" type="text/css" />
<script src="../javascript/functions.js" type="text/javascript"></script>
<title>Meredith News</title>

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
<div id="wrapper">
<div class="toolbar">
            <div id="leftbutton"><a href="http://m.meredith.edu">Home</a></div>
            <h1>News</span></h1>
</div>  

<div id='container'>
		<form action="http://m.meredith.edu/news/" method="post" name="enews">
				<div class="nav">
					<!-- PASS THE NEWS CATEGORY BACK TO THIS SAME PAGE USING THE POST METHOD WHEN SOMETHING NEW IS SELECTED -->
		    		<select name="SubmitterType" method="post" onChange=document.enews.submit();>
<?
					/* Show the news category in the dropdown box based on the user's selection using the <option value selected> attribute
					If the category is not selected, still use the echo command to display it in the drop down box
					*/
					if ($newstype == "Headlines") 
		      			echo "<option value='Headlines' selected>Campus News</option>"; 
		      		else  echo "<option value='Headlines'>Campus News</option>"; 
		      		
		      		if ($newstype == "Community") 
		      			echo "<option value='Community' selected>Community News</option>"; 
		      		else  echo "<option value='Community'>Community News</option>"; 
		      		
		      		if ($newstype == "Faculty/Staff") 
		      			echo "<option value='Faculty/Staff' selected>Faculty/Staff News</option>"; 
		      		else  echo "<option value='Faculty/Staff'>Faculty/Staff News</option>"; 
		      		
		      		if ($newstype == "Student") 
		      			echo "<option value='Student' selected>Student News</option>"; 
		      		else  echo "<option value='Student'>Student News</option>"; 
?>		      		
	    			</select>
	    		</div>	
		</form>

<ul class='stories'>

<? 
// OPEN THE CONNECTION TO THE MYSQL DATABASE`
$link = mysql_connect('localhost:3305', 'root', 'root');

// RETURN ERROR MESSAGE IF THE CONNECTION TO THE MYSQL DATABASE CANNOT BE OPENED
if (!$link)
{	die('Could not connect: ' . mysql_error());	}

// CHOOSE THE 'ENEWS' DATABASE, AND RETURN AN ERROR IF IT CANNOT BE ACCESSED
$db_selected = mysql_select_db("enews", $link);
if (!$db_selected)
{	die ("Can\'t use database : " . mysql_error());		}
else
{	
	// RETRIEVE NEWS ARTICLES FROM THE LAST TWO WEEKS
	$datequery = "SELECT CURDATE() - INTERVAL 14 DAY;";
	$dateresource = mysql_query($datequery);
	$twoweeksago = mysql_fetch_array($dateresource);
	
	// EXECUTE THE SQL QUERY
	$sql = "SELECT substring_index(Article,' ',20) as preview,id,SubmitterType,Name,Email,Department,Title,Article,Photo,Full_Photo,DateSubmitted,DaysViewable,Displayed,New,Emergency,DisplayDateSubmitted,URL 
				FROM enews07 WHERE SubmitterType = '$newstype' AND DateSubmitted BETWEEN '$twoweeksago' AND CURDATE() ORDER BY 
				DateSubmitted DESC";				
	
	$result = mysql_query($sql);
	
	// GET THE NUMBER OF RESULTS RETURNED FROM THE SQL QUERY
	$num_results = mysql_num_rows($result);
					  												  
	// ONLY SHOW THE LAST 10 ARTICLES, UNLESS THERE ARE LESS THAN 10 ARTICLES FROM THE LAST TWO WEEKS
	if ($num_results >= 10)
		$LimitToDisplay = 10;	
	else
		$LimitToDisplay = $num_results;	
					  
	for ($i=0; $i < $LimitToDisplay; $i++)
	{
		$row = mysql_fetch_array($result);
		
		//USE FUNCTION IN 'COMMON.PHP' TO CONVERT THE DATE FROM YYYY-MM-DD FORMAT TO MORE READABLE "MONTH DAY, YEAR" FORMAT
		$formattedDate = convertDate($row["DateSubmitted"]);
		
		// USE THE PHOTO THAT ACCOMPANIES THE ARTICLE, IF IT EXISTS.  IF NOT, USE THE STANDARD ENEWS IMAGE
		if ($row["Full_Photo"]) 
			$article_photo = "../images/MeredithCollege/enews/" . $row["Full_Photo"]; 	
		else 
		 	$article_photo = "../images/MeredithCollege/enews.png"; 	
		
		// MANIPULATE THE ARTICLE TITLE & PREVIEW DATA TO MAKE IT INTO A MANAGEABLE SIZE
		if (strlen($row["Title"]) > 50) 
			$article_title = substr($row["Title"], 0, 50) . "...";
		else 
			$article_title = $row["Title"];
		
		$preview = substr($row["preview"], 0, 55) . "...";

		// DISPLAY THE ARTICLE PHOTO, TITLE, AND PREVIEW
		echo "<li><a href=announcement_details.php?id=" . $row["id"] . "><img src=" . $article_photo ." width=\"76\" height=\"75\" alt=\"\" class=\"storythumb\" \/>" . $article_title . " <br> <span class='deck'>".$preview."</span></a></li>";

	}	// End of the For Loop
}			
?>

</ul>
</div>

<div id="footer" align="center"><br>
	<a href="../social/facebook.php"><img src="../images/MeredithCollege/facebook_black_f.png" width="11" height="22" hspace="10" alt="Facebook" /></a>
	<a href="../social/twitter.php"><img src="../images/MeredithCollege/tweetie.png" width="25" height="22" hspace="10" alt="Twitter" /></a>
	<a href="http://www.youtube.com/meredithcollege"><img src="../images/MeredithCollege/youtube_black.png" width="19" height="22" hspace="10" alt="YouTube" /></a>
	<br><br>
	Meredith College | Raleigh, NC | <a href="../about/about.php">About This Site<br/></a><br>
</div>

</div>
</body>
</html>

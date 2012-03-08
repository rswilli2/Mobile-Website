<?
$searchterm = $_REQUEST["query"];
$searchcriteria = $_REQUEST["criteria"];
$searchagain = $_REQUEST["return"];

//Test the database connection 
$db = mysql_pconnect("localhost", "root", "root");

//POST AN ERROR MESSAGE IF A CONNECTION TO THE DATABASE CANNOT BE MADE
if (!$db)
{
   echo "<font face=Verdana,Arial,sans-serif size=2 color=#FF0000>Error: Could not connect to database.  Please try again later.</font>";
   exit;
}

// QUERY THE DATABASE FOR THE INFORMATION PASSED TO THIS PAGE
mysql_select_db("directory");
$sql = "SELECT * FROM employees WHERE ".$searchcriteria." LIKE '".$searchterm."%' ORDER BY lastname ASC";

// ASSIGN THE RESULTS FROM THE QUERY TO THE "RESULT" VARIABLE
$result = mysql_query($sql);
					
// ASSIGN THE NUMBER OF ROWS RETURNED FROM THE QUERY TO THE "NUM_RESULTS" VARIABLE
$num_results = mysql_num_rows($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width,user-scalable=no" />
<link href="../css/core.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="apple-touch-icon" href="robert.png"/>
<script src="../javascript/functions.js" type="text/javascript"></script>
<title>Search Results</title>
<meta content="keyword1,keyword2,keyword3" name="keywords" />
<meta content="Description of your page" name="description" />
<meta name="format-detection" content="telephone=yes"/>
</head>

<body onload="scrollTo(0,1);">
	<div class="toolbar">
			<div id="leftbutton"><a href="search.php" onClick="history.back();return false;">Back</a></div>
			<div id="rightbutton"><a href="http://m.meredith.edu">Home</a></div>
            <h1>Search Results</span></h1>
	</div>  

<?	
// LET THE USER KNOW IF THERE ARE NO RESULTS FROM THE SEARCH
if ($num_results == 0) {
	echo "<br><h3>No results returned for '".$searchterm."'.<br>Please try a different search.</h3>";
}

else {
	$first_iteration = 0;
	$namearray = array();		//Create an empty array to be used for name listings
	$firstletter;						
	$letterfound = false;

	for ($i=0; $i < $num_results; $i++) {
		$row = mysql_fetch_array($result);
		
		//ASSIGN THE USER'S EMAIL ADDRESS TO A VARIABLE
		$myemail = $row["Email"];
	
		//ASSIGN THE USER'S NAME (IN LAST NAME, FIRST NAME ORDER) TO A VARIABLE FOR PRESENTING AS SEARCH RESULTS
		$username = $row["lastname"] . ", " . $row["firstname"];
	
		//REMOVE THE DASH FROM THE USER'S PHONE NUMBER IF PRESENT
		$phonenumber = preg_replace("/[^0-9\s]/","",$row["PhoneNumber"]);
	
		if (($num_results > 1) && ($searchagain == false)) {
	      	//DISPLAY THE NUMBER OF SEARCH RESULTS
			if ($first_iteration == 0) { 
				echo "<h3>".$num_results . " results returned for '".$searchterm."'.</h3>";
				echo "<div id='edge'><ul class='edgetoedge'>";
				
				//THE NUMBER OF SEARCH RESULTS WILL NOT BE PRINTED AGAIN NOW THAT THIS VARIABLE'S VALUE HAS CHANGED
				$first_iteration = 1; 
			}
		
		//GET THE FIRST LETTER OF THE USER'S LAST NAME
		$firstletter = $row["lastname"][0];
		
		//ITERATE THROUGH THE NAMEARRAY ARRAY - IF THE VALUE OF THE VARIABLE "FIRSTLETTER" IS FOUND IN THE ARRAY, SKIP THE NEXT IF CLAUSE
		//BECAUSE THERE IS NO REASON TO DISPLAY A SECTION FOR THAT LETTER ON THE SEARCH RESULTS PAGE
		foreach($namearray as $key => $value)
		{  
			if ($value == $firstletter) $letterfound =  true; 
		}
		
		//IF THE FIRST LETTER OF THE USER'S LAST NAME WAS NOT FOUND IN THE NAMEARRAY ARRAY....
		if ($letterfound == false) { 
			//ADD THE FIRST LETTER OF THE USER'S LAST NAME TO THE ARRAY
			$namearray[] = $firstletter;
			//CREATE A SECTION FOR ALL SEARCH RESULTS WHOSE LAST NAMES BEGIN WITH THE CURRENT LETTER
			echo "<li class='sep'>".$firstletter."</li>";
		}
		//LIST ALL OF THE SEARCH RESULTS WHOSE LAST NAMES BEGIN WITH THE CURRENT LETTER
		echo "<li><a style='text-decoration:none;color:black' href=\"search.php?criteria=Email&query=".$myemail."&return=true\">$username</a></li>";
		$letterfound = false;
		
	} //end of if (num_results) clause
	
	//ELSE, WE ONLY HAVE ONE SEARCH RESULT, SO DISPLAY ALL OF THE USER'S INFORMATION
	else {
		//DESTROY THE ARRAY, BECAUSE IT'S NOT NEEDED FOR ONLY ONE SEARCH RESULT
		unset($namearray);
?>	
		<ul class="nav">
		<li><div class="label">name</div><div class="value"><? echo($row["firstname"] . " " . $row["lastname"]); ?></div></li>
		<li><div class="label">title</div><div class="value"><? echo($row["Title"]); ?></div></li>
		<li><div class="label">dept</div><div class="value"><? echo($row["Department"]); ?></div></li>
		<li><div class="label">office</div><div class="value"><? echo ($row["CampusAddress"]); ?></div></li>
<?	echo "<li><a href='tel:1919".$phonenumber."' class='phone'><div class='label'>phone</div><div class='value'>(". $row["Prefix"] . ") " . $row["PhoneNumber"]."</div></a></li>"; ?>
<?	echo "<li><a href='mailto:".$myemail. '@meredith.edu'."' class='email'><div class='label'>email</div><div class='value'>".$row['Email'] . '@meredith.edu'."</div></a></li>";   ?>		
		</ul>
<?
	}
}
echo "</ul></div>";
}
?>


</div>
</div>
</div>

<div id="footer" align="center"><br>
	<a href="../social/facebook.php"><img src="../images/MeredithCollege/facebook_black_f.png" width="11" height="22" hspace="10" alt="Facebook" /></a>
	<a href="../social/twitter.php"><img src="../images/MeredithCollege/tweetie.png" width="25" height="22" hspace="10" alt="Twitter" /></a>
	<a href="http://www.youtube.com/meredithcollege"><img src="../images/MeredithCollege/youtube_black.png" width="19" height="22" hspace="10" alt="YouTube" /></a>
	<br><br>
	Meredith College • Raleigh, NC • <a href="../about/about.php">About This Site<br/></a>
</div>

</body>
</html>

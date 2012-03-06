<?
$requestvar = $_REQUEST["event"];

switch ($requestvar) {
	case 'ncdf': 
		$event = "North Carolina Dance Festival & Children's Festival";
		$dates = array("September 9, 8:00 PM" => "September 9, 8:00 PM", 'September 10, 8:00 PM' => 'September 10, 8:00 PM', 'September 11, 3:00 PM' => 'September 11, 3:00 PM');
		break;	
	case 'tempest':
		$event = "The Tempest by William Shakespeare";
		$dates = array('September 28, 11:00 AM' => 'September 28, 11:00 AM', 'September 29, 11:00 AM' => 'September 29, 11:00 AM', 'September 30, 6:00 PM' => 'September 30, 6:00 PM', 'October 1, 6:00 PM' => 'October 1, 6:00 PM', 'October 2, 3:00 PM' =>'October 2, 3:00 PM');
		break;
	case 'nctc':
		$event = "NCTC High School Play Festival";
		$dates = array('October 28 - All Day' => 'October 28 - All Day', 'October 29 - All Day' =>'October 29 - All Day');
		break;
	case 'ia':
		$event = "Intimate Apparel by Lynn Nottage";
		$dates = array('November 8, 8:00 PM'=>'November 8, 8:00 PM', 'November 9, 8:00 PM'=>'November 9, 8:00 PM', 'November 10, 8:00 PM'=>'November 10, 8:00 PM', 'November 11, 8:00 PM'=>'November 11, 8:00 PM', 'November 12, 8:00 PM'=>'November 12, 8:00 PM', 'November 13, 3:00 PM'=>'November 13, 3:00 PM');
		break;
	case 'hsdd': 
		$event = "High School Day of Dance";
		$dates = array('November 18, 8:30 AM'=>'November 18, 8:30 AM');
		break;
	case 'mdtc':
		$event = "Meredith Dance Theatre In Concert";
		$dates = array('November 18, 8:00 PM'=>'November 18, 8:00 PM', 'November 19, 8:00 PM'=>'November 19, 8:00 PM', 'November 20, 8:00 PM'=>'November 20, 8:00 PM');
		break;
	case 'ds':
		$event = "Directing Scenes";
		$dates = array('December 1, 8:00 PM'=>'December 1, 8:00 PM', 'December 2, 8:00 PM'=>'December 2, 8:00 PM');
		break;
	case 'lu':
		$event = "Little Utopia and Other Dances by Carol Kyles Finley and It Must Have Been Violet Dance Productions";
		$dates = array('January 7, 8:00 PM'=>'January 7, 8:00 PM', 'January 8, 3:00 PM'=>'January 8, 3:00 PM');
		break;
	case 'mjtc':
		$event = "Meredith Jazz and Tap Company";
		$dates = array('January 27, 8:00 PM'=>'January 27, 8:00 PM', 'January 28, 8:00 PM'=>'January 28, 8:00 PM');
		break;		
	case 'tsom':
		$event = "The Sound of Music by Rodgers & Hammerstein";
		$dates = array('February 14, 8:00 PM'=>'February 14, 8:00 PM', 'February 15, 8:00 PM'=>'February 15, 8:00 PM', 'February 16, 8:00 PM'=>'February 16, 8:00 PM', 'February 17, 8:00 PM'=>'February 17, 8:00 PM', 'February 18, 8:00 PM'=>'February 18, 8:00 PM', 'February 19, 3:00 PM'=>'February 19, 3:00 PM');
		break;
	case 'vm':
		$event = "The Vagina Monologues by Eve Ensler";
		$dates = array('February 29, 8:00 PM'=>'February 29, 8:00 PM', 'March 1, 8:00 PM'=>'March 1, 8:00 PM');
		break;
	case 'ss':
		$event = "Stillwater Show (Professional Theatre Company In Residence";
		$dates = array('March 22, 8:00 PM'=>'March 22, 8:00 PM', 'March 23, 8:00 PM'=>'March 23, 8:00 PM', 'March 24, 8:00 PM'=>'March 24, 8:00 PM', 'March 25, 3:00 PM'=>'March 25, 3:00 PM', 'March 27, 8:00 PM'=>'March 27, 8:00 PM', 'March 28, 8:00 PM'=>'March 28, 8:00 PM', 'March 29, 8:00 PM'=>'March 29, 8:00 PM', 'March 30, 8:00 PM'=>'March 30, 8:00 PM', 'March 31, 8:00 PM'=>'March 31, 8:00 PM', 'April 1, 3:00 PM'=>'April 1, 3:00 PM');
		break;
	case 'dw':
		$event = "DanceWorks";
		$dates = array('April 20, 8:00 PM'=>'April 20, 8:00 PM', 'April 21, 3:00 PM'=>'April 21, 3:00 PM', 'April 21, 8:00 PM'=>'April 21, 8:00 PM', 'April 22, 3:00 PM'=>'April 22, 3:00 PM', 'April 22, 8:00 PM'=>'April 22, 8:00 PM'); 
		break;
	default: 
		break;
}

function generateSelect($name, $options = array() ) {
	$html = "<select name='".$name."'>";
	foreach ($options as $option => $value) 
	{
		$html .= "<option value='".$value."'>".$option."</option>";
	}
	$html .= "</select>";
	return $html;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<link href="../pics/homescreen.gif" rel="apple-touch-icon" />
<meta name="viewport" content="width=device-width,user-scalable=no" />
<link href="../css/core.css" rel="stylesheet" media="screen" type="text/css" />
<script src="../javascript/functions.js" type="text/javascript"></script>
<title>Ticket Request Form</title>

<!-- GOOGLE ANALYTICS CODE -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10083761-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  
  function isEmpty(str) {
  	// Check whether a string is empty
  	for (var intLoop = 0; intLoop < str.length; intLoop++)
  		if (" " != str.charAt(intLoop))
  			return false;
  	return true;
  	}
  	
  	function checkRequired(f) {
  		var strError = "";
  		for (var intLoop = 0; intLoop < f.elements.length; intLoop++)
  			if (null != f.elements[intLoop].getAttribute("required"))
  				if (isEmpty(f.elements[intLoop].value))
  					strError += " " + f.elements[intLoop].name + "\n";
  		if ("" != strError) {
  			alert ("Required field is empty:\n" + strError);
  			return false;
  		}
  	}	
  
</script>

</head>

<body onload="scrollTo(0,1);">
<div id="wrapper">
	<div class="toolbar">
			<div id="leftbutton"><a href="./season.php">Back</a></div>
			<div id="rightbutton"><a href="http://m.meredith.edu">Home</a></div>
			<h1>Request Tickets</h1>
    </div>     

	<div id="copyBase">
		<form action="mailto:boxoffice@meredith.edu?subject=Ticket Request" enctype="text/plain" method="post" onsubmit="return checkRequired(this);">
		  				
			 <div class="nav">
			      	<li>
			      		<? echo "<b>$event</b><input name='Event' id='Event' type='hidden' value='".$event."'>"; ?>
			      	</li>
			      	<li><b>Select the date & time:</b></li>
		    		<li>
		    			<? $dropdown = generateSelect('Event Date', $dates); 
		    				 echo $dropdown; 
		    			?>
		    		</li>
			      	<li><b>Enter your name:</b>
			    		<fieldset class="inputcombo">
						<input class="forminput" type="text" name="Name" value="" required>
						</fieldset>
					</li>
			    	<li><b>Enter your email address:</b>
			    		<fieldset class="inputcombo">
						<input class="forminput" type="text" name="Email Address" value="" required>
						</fieldset>
					<li><b>Enter the number of tickets:</b></li>
	    			<li><input type="tel" size="3" maxlength="3" name="General Tickets" value="0"> General Admission</li>
	    			<li><input type="tel" size="3" maxlength="3" name="Student & Seniors Tickets" value="0"> Students & Seniors</li>
	    			<li><input type="tel" size="3" maxlength="3" name="Child Tickets" value="0"> Child</li>
	    			<li><input type="tel" size="3" maxlength="3" name="Faculty/Staff Tickets" value="0"> Meredith Faculty & Staff</li>
	    			<li><input type="tel" size="3" maxlength="3" name="Other Tickets" value="0"> Other</li>
	    			<li>
	    				<b>Comments:</b></li>
	    				<textarea name="Comments" rows=4></textarea>
	    			</li>
					<li><center><input type="submit" value="Send to Box Office"><br>
					<span class="smallprint">*The box office will contact you via email with a response to your ticket request.</span></center>
					</li>								
		</div>   
		</form>
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

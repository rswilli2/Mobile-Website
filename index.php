<?php

include_once('lib/phpweatherlib.php');
include_once('lib/check_mobile_referrer.php');
include('lib/mobile_device_detect.php');
include('lib/emergency_search.php');

//Determine if the browser is from a mobile device
$mobile = mobile_device_detect();

//If it's not a mobile device, redirect the user to Meredith's regular homepage
if(!$mobile)
	echo "<meta http-equiv='refresh' content='0;url=http://www.meredith.edu'>";

$displayWeather=true;

//CREATE OUR WEATHERLIB OBJECT FOR RALEIGH (WEATHER STATION KRDU)
$weatherObj=new WeatherLib('KRDU');

if($weatherObj->has_error())
	$displayWeather = false;
	
$temperature = $weatherObj->get_temp_f();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta http-equiv="Content-Language" content="en-US" />
<meta name="viewport" content="width=device-width,user-scalable=no" />

<link href="css/core.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="apple-touch-icon" href="./images/MeredithCollege/athletics.png" width="120" height="120" />

<script src="javascript/functions.js" type="text/javascript"></script>

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
    	<h2><a href="#"><img src="./images/MeredithCollege/M_Wrdmrk_Silkscr_Wht.gif" width="150" height="35"/></a></h2>
  	</div>

  	<ul id="home" class="home" selected="true">
		<li class="time" align="center">
			<? $today = date("l, F j, Y | g:i a T");  
				 echo $today;
				 //if($displayWeather) echo " | " . $temperature . "º F";  
			?>
		</li>
	</ul>

<?
// Display emergency alert
$alert_status = emergency_search();
if($alert_status)
{
   echo "<div align='center'>";
   echo "<font color='#ffffff' size='+1'><marquee bgcolor='#000000' direction='left' loop='20' 
			width='100%'><strong>There is currently an emergency situation on campus.  Please check the 'Emergency' section 
			for details & instructions.</strong></marquee></font>";
   echo "</div>";
}
?>

<div id="container">
	<table cellpadding="0" cellspacing="0" border="0" id="homegrid">
		<tr>
			<td><a href="http://m.meredith.edu/people/"><img src="./images/MeredithCollege/myspace_red.png" width="60" height="60" alt="Directory" /><br/>Directory</a></td>
			<td><a href="http://m.meredith.edu/news/"><img src="./images/MeredithCollege/news.png" width="60" height="60" alt="News" /><br/>News</a></td>
			<td><a href="http://m.meredith.edu/email/"><img src="./images/MeredithCollege/mail_red.png" width="60" height="60" alt="Email" /><br/>Email</a></td>
			<td><a href="./people/emergency.html"><img src="./images/MeredithCollege/emergency_red.png" width="60" height="60" alt="Emergency" /><br/>Emergency</a></td>
		</tr>
 		<tr>
 			<td><a href="http://m.meredith.edu/hours/"><img src="./images/MeredithCollege/clock_red.png" width="60" height="60" alt="Hours" /><br/>Hours<br/></a></td>
			<td><a href="http://m.meredith.edu/calendar/"><img src="./images/MeredithCollege/calendar_red.png" width="60" height="60" alt="Safety" /><br/>Academic Calendar</a></td>
			<td><a href="./map/map_details.php?maptype=full"><img src="./images/MeredithCollege/compass_red.png" width="60" height="60" alt="Map" /><br/>Map</a></td>
			<td><a href="http://www.meredith.edu/library/mobile/main.htm"><img src="./images/MeredithCollege/library.png" width="60" height="60" alt="Library" /><br/>Library</a></td>			
		</tr>
		<tr>			
			<td><a href="http://www.goavengingangels.com"><img src="./images/MeredithCollege/athletics.png" width="60" height="60" alt="Safety" /><br/>Athletics</a></td>
			<td><a href="http://www.meredith.edu?skipmobile=1"><img src="./images/MeredithCollege/fullsite_red.png" width="60" height="60" alt="Full Site" /><br/>Full Site<br/></a></td>	
		</tr>	
	</table>
</div>

<div id="footer" align="center"><br>
	<a href="./social/facebook.php"><img src="./images/MeredithCollege/facebook_black_f.png" width="11" height="22" hspace="10" alt="Facebook" /></a>
	<a href="./social/twitter.php"><img src="./images/MeredithCollege/tweetie.png" width="25" height="22" hspace="10" alt="Twitter" /></a>
	<a href="./social/youtube.html"><img src="./images/MeredithCollege/youtube_black.png" width="19" height="22" hspace="10" alt="YouTube" /></a>
	<br><br>Meredith College • Raleigh, NC • <a href="./about/about.php">About This Site<br/></a>
</div>
</body>

</html>

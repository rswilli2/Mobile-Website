<?php
include '../functions.php';

$building_name = $_GET["building"];
$map_type = $_GET["maptype"];

$coords = set_coordinates($building_name);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width,user-scalable=yes" />
<link href="../css/core.css" rel="stylesheet" media="screen" type="text/css" />
<link href="../css/map-ip.css" rel="stylesheet" media="screen" type="text/css" />

<!-- Set the .png file that you want to use as a iPhone springboard icon -->
<link rel="apple-touch-icon" href="robert.png"/>

<script type="text/javascript">
var photoURL = 'http://www.meredith.edu/students/reslife/images/dorm2.jpg';
</script>

<script src="../javascript/functions.js" type="text/javascript"></script>
<script src="../javascript/uiscripts.js" type="text/javascript"></script>
<script src="../javascript/map-ip.js" type="text/javascript"></script>


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

<body onload="scrollTo(0,1); loadImage(getMapURL(mapBaseURL),'mapimage');">
<div class="toolbar">
            <div id="leftbutton"><a href="http://m.meredith.edu">Home</a></div>
	    <!-- <div id="rightbutton"><a href="../index.php">Home</a></div> -->
            <h1>Campus Map</span></h1>
</div>  

<? 
if ($map_type == "full")
{
	echo "<div id='container'>
				<ul class='nav'>
					<img src='../images/MeredithCollege/2010map.jpg' width='100%'></a>
				</ul>	
		  </div>";
}

else
{
	echo "<a name='scrolldown'></a>
			<div class='focal shaded'>
			<h2>".$building_name. "</h2>
			<p class='address'>On the Meredith Campus<br /> 3800 Hillsborough Street </p>
			
			<ul id='tabs'>";
?>			

				<li class="active"><a href="#scrolldown" onclick="showTab('maptab',this)">Map</a></li> 
				<li><a href="#scrolldown" onclick="showTab('phototab',this),loadImage(photoURL,'photo')">Photo</a></li>	
				<li><a href="#scrolldown" onclick="showTab('heretab',this)">What's Here</a></li>
<?
	echo	"</ul>

			<div id='tabbodies'>		

			<div class='tabbody' id='maptab'>
				<iframe width='280' height='280' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='http://maps.google.com/maps?sll=35.796661081526665,-78.68937134742737&amp;ie=UTF8&amp;ll=35.796661,-78.689371&amp;spn=0.002611,0.003219&amp;z=17&amp;output=embed'></iframe>
				<br /><small><a href='http://maps.google.com/maps?sll=35.796661081526665,-78.68937134742737&amp;ie=UTF8&amp;ll=35.796661,-78.689371&amp;spn=0.002611,0.003219&amp;z=17&amp;source=embed' style='color:#0000FF;text-align:left'>View Larger Map</a></small>
			</div> <!-- id='maptab' -->			
			
			<div class='tabbody' id='phototab' style='display:none'>
				<img id='loadingimage2' src='../images/MeredithCollege/dorm2.jpg' width='40' height='40' alt='Loading' />";
?>				
				<img id="photo" src="" width="" height="" alt="Photo" onload="hide('loadingimage2')" />			
<?
	echo	"</div>  <!-- id='phototab' -->
			
			<div class='tabbody' id='heretab' style='display:none'>
				<ul>
					<li>Insert description of building here</li>
				</ul>
			</div> <!-- id='heretab' -->
			
			
			<div class='clear'></div>
			</div> <!-- id='tabbodies' -->
			</div> <!-- class='focal shaded' -->
			<ul class='secondary'>
				<li>
					<a href='".$coords."' class='external'>Launch Google Maps</a>
				</li>
			</ul>
			</div>";
}
?>
<div id="footer" align="center"><br>
	<a href="../social/facebook.php"><img src="../images/MeredithCollege/facebook_black_f.png" width="11" height="22" hspace="10" alt="Facebook" /></a>
	<a href="../social/twitter.php"><img src="../images/MeredithCollege/tweetie.png" width="25" height="22" hspace="10" alt="Twitter" /></a>
	<a href="http://www.youtube.com/meredithcollege"><img src="../images/MeredithCollege/youtube_black.png" width="19" height="22" hspace="10" alt="YouTube" /></a>
	<br><br>
	Meredith College • Raleigh, NC • <a href="../about/about.php">About This Site<br/></a>
</div>

</body>
</html>

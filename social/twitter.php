<?php
require_once 'inc/Tweetgater/Display.php';

$page = 1;

if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width,user-scalable=yes" />
<link href="../css/core.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="apple-touch-icon" href="robert.png"/>
<script src="javascript/functions.js" type="text/javascript"></script>
<title>Meredith on Twitter</title>
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
<div id="wrapper">
<div class="toolbar">
			<div id="leftbutton"><a href="http://m.meredith.edu">Home</a></div>
			<h1>Twitter</span></h1>
</div> 
	
<div id="copyBase">
	<ul class="nav">
		<li><a href="http://www.twitter.com/avengingangels"><img align="center" src="../images/MeredithCollege/twitter_new.png" width="32" height="32"  /> Meredith Athletics</a></li>
		<li><a href="http://www.twitter.com/meredithcollege"><img align="center" src="../images/MeredithCollege/twitter_new.png" width="32" height="32" /> Meredith College</a></li>
		<li><a href="http://www.twitter.com/meredithherald"><img align="center" src="../images/MeredithCollege/twitter_new.png" width="32" height="32"  /> Meredith Herald</a></li>
		<li><a href="http://www.twitter.com/meredithit"><img align="center" src="../images/MeredithCollege/twitter_new.png" width="32" height="32"  /> Tech Services</a></li>
	</ul>
	<ul class="nav">
	<li><h4><b>Meredith College's Last 10 Tweets</b></h4></li>
	<?php echo Tweetgater_Display::timeline($page); ?>
	</ul>
</div>


<div id="footer" align="center"><br>
	<a href="./facebook.php"><img src="../images/MeredithCollege/facebook_black_f.png" width="11" height="22" hspace="10" alt="Facebook" /></a>
	<a href="./twitter.php"><img src="../images/MeredithCollege/tweetie.png" width="25" height="22" hspace="10" alt="Twitter" /></a>
	<a href="http://www.youtube.com/meredithcollege"><img src="../images/MeredithCollege/youtube_black.png" width="19" height="22" hspace="10" alt="YouTube" /></a>
	<br><br>
	Meredith College • Raleigh, NC • <a href="../about/about.php">About This Site<br/></a><br>
</div>
 </div>	

</body>

</html>

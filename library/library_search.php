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
<title>Meredith Directory</title>

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
            <div id="leftbutton"><a href="./library.html">Back</a></div>
			<div id="rightbutton"><a href="../index.php">Home</a></div>
            <h1>Catalog Search</span></h1>
</div>  


<div id="copyBase">
	<form action="http://library.meredith.edu/search~/" method="get" name="QuickSearch">
			 <div class="nav">
			    	<li>Select your search criteria:</li>
		    		<li><select name="searchtype">
		      			<option value="t">Title</option>
	      				<option value="a">Author</option>
	      				<option value="d">Subject</option>
	      				<option value="X">Keyword</option>
	    			</select></li>
			<li><fieldset class="inputcombo emphasized">
					<input class="forminput" type="text" name="searcharg" placeholder="Search the catalog..." value="">
					<input class="combobutton" id="sch_btn" src="../images/MeredithCollege/search-button.png" type="image">			
			</fieldset></li>
		</div>   
		</form>
	</div>
	
<h5>*Note: This search will redirect to the full Carlyle Campbell Library website.*</h5>	


</div>
<div id="footer" align="center"><br><strong>©2010 Meredith College</strong><br>3800 Hillsborough Street | Raleigh, NC 27607<br><a 
href="../about/about.php" color="white"><strong>About This Site</strong></a></div>

</body>

</html>

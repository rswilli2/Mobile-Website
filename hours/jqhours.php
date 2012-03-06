<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		<meta charset="UTF-8" />
        <title>Meredith College Mobile Web;</title>
        <style type="text/css" media="screen">@import "../jqtouch/jqtouch.min.css";</style>
        <style type="text/css" media="screen">@import "../themes/jqt/theme.min.css";</style>
        <script src="../jqtouch/jquery.1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="../jqtouch/jqtouch.min.js" type="application/x-javascript" charset="utf-8"></script>
        <script type="text/javascript" charset="utf-8">
            var jQT = new $.jQTouch({
                icon: 'jqtouch.png',
                addGlossToIcon: false,
                startupScreen: 'jqt_startup.png',
                statusBar: 'black',
                preloadImages: [
                    '../themes/jqt/img/back_button.png',
                    '../themes/jqt/img/back_button_clicked.png',
                    '../themes/jqt/img/button_clicked.png',
                    '../themes/jqt/img/grayButton.png',
                    '../themes/jqt/img/whiteButton.png',
                    '../themes/jqt/img/loading.gif'
                    ]
            });
         // Some sample Javascript functions:
            $(function(){
                // Show a swipe event on swipe test
                $('#swipeme').swipe(function(evt, data) {                
                    $(this).html('You swiped <strong>' + data.direction + '</strong>!');
                });
                $('a[target="_blank"]').click(function() {
                    if (confirm('This link opens in a new window.')) {
                        return true;
                    } else {
                        $(this).removeClass('active');
                        return false;
                    }
                });
                // Page animation callback events
                $('#pageevents').
                    bind('pageAnimationStart', function(e, info){ 
                        $(this).find('.info').append('Started animating ' + info.direction + '&hellip; ');
                    }).
                    bind('pageAnimationEnd', function(e, info){
                        $(this).find('.info').append(' finished animating ' + info.direction + '.<br /><br />');
                    });
                // Page animations end with AJAX callback event, example 1 (load remote HTML only first time)
                $('#callback').bind('pageAnimationEnd', function(e, info){
                    if (!$(this).data('loaded')) {                      // Make sure the data hasn't already been loaded (we'll set 'loaded' to true a couple lines further down)
                        $(this).append($('<div>Loading</div>').         // Append a placeholder in case the remote HTML takes its sweet time making it back
                            load('ajax.html .info', function() {        // Overwrite the "Loading" placeholder text with the remote HTML
                                $(this).parent().data('loaded', true);  // Set the 'loaded' var to true so we know not to re-load the HTML next time the #callback div animation ends
                            }));
                    }
                });
                // Orientation callback event
                $('body').bind('turn', function(e, data){
                    $('#orient').html('Orientation: ' + data.orientation);
                });
            });   
            
        </script> 
        <style type="text/css" media="screen">
            body.fullscreen #home .info {
                display: none;
            }
            #about {
                padding: 100px 10px 40px;
                text-shadow: rgba(255, 255, 255, 0.3) 0px -1px 0;
                font-size: 13px;
                text-align: center;
                background: #999999;
            }
            #about p {
                margin-bottom: 8px;
            }
            #about a {
                color: #fff;
                font-weight: bold;
                text-decoration: none;
            }
        </style>
</head>

<body onload="scrollTo(0,1);">

	<div id="about" class="selectable">
                <p><img src="../images/MeredithCollege/MeredithLogo.png" /></p>
                <p><strong>Meredith College Mobile Web</strong><br />Version 1.0 beta<br />
                    <a href="http://www.meredith.edu">By Robert Williams</a></p>
                <p><em>Create powerful mobile apps with<br /> just HTML, CSS, and jQuery.</em></p>
                <p>
                    <a href="http://twitter.com/meredithcollege" target="_blank">@Meredith College on Twitter</a>
                </p>
                <p><br /><br /><a href="#" class="grayButton goback">Close</a></p>
     </div>

 	<div id="home" class="current">
            <div class="toolbar">
                <h1>Hours</h1>
                <a class="back" href="#">Home</a>
                <a class="button slideup" id="infoButton" href="#about">About</a>
            </div>
            <ul class="rounded">
                <li class="arrow"><a class="flip" href="../library/library_hours.html" target="self"><img align="center" src="../thumbs/redclock.png" width="32" height="32" /> Library</a></li>
				<li class="arrow"><a class="flip" href="./dining_hours.html"><img align="center" src="../thumbs/redclock.png" width="32" height="32" /> Dining</a></li>
				<li class="arrow"><a class="flip" href="./bookstore_hours.html"><img align="center" src="../thumbs/redclock.png" width="32" height="32" /> Bookstore</a></li>
				<li class="arrow"><a class="flip" href="./fitness_hours.html"><img align="center" src="../thumbs/redclock.png" width="32" height="32" /> Fitness Center</a></li>
            </ul>
            <ul class="rounded">
                <li class="forward"><a href="http://www.jqtouch.com/" target="_blank">Homepage</a></li>
                <li class="forward"><a href="http://www.twitter.com/jqtouch" target="_blank">Twitter</a></li>
                <li class="forward"><a href="http://code.google.com/p/jqtouch/w/list" target="_blank">Google Code</a></li>
            </ul>
    </div>
    
<!--
<div id="wrapper">
<div id="navbar">
		<ul id="breadcrumbs">
            <li><a href="../index.php"><img src="../images/MeredithCollege/home.png" align="center" /></a></li>
            <li class="pagetitle"><span>Hours</span></li>
        </ul>  
</div>  



<div id="copyBase">
<ul class="nav">
<li class="arrow"><a href="../library/library_hours.html"><img align="center" src="../thumbs/redclock.png" width="32" height="32" /> Library</a></li>
<li class="arrow"><a href="dining_hours.html"><img align="center" src="../thumbs/redclock.png" width="32" height="32" /> Dining</a></li>
<li class="arrow"><a href="bookstore_hours.html"><img align="center" src="../thumbs/redclock.png" width="32" height="32" /> Bookstore</a></li>
<li class="arrow"><a href="fitness_hours.html"><img align="center" src="../thumbs/redclock.png" width="32" height="32" /> Fitness Center</a></li>
</ul>
</div>

</div>
-->
<div class="footer" align="center"><br><strong>Meredith College</strong><br>3800 Hillsborough Street | Raleigh, NC 27607</div>
</body>

</html>

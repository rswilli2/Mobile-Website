<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>jQTouch &beta;</title>
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
                background: #161618;
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
    <body>
        <div id="about" class="selectable">
                <p><img src="jqtouch.png" /></p>
                <p><strong>jQTouch</strong><br />Version 1.0 beta<br />
                    <a href="http://www.davidkaneda.com">By David Kaneda</a></p>
                <p><em>Create powerful mobile apps with<br /> just HTML, CSS, and jQuery.</em></p>
                <p>
                    <a href="http://twitter.com/jqtouch" target="_blank">@jQTouch on Twitter</a>
                </p>
                <p><br /><br /><a href="#" class="grayButton goback">Close</a></p>
        </div>
        <div id="ajax">
            <div class="toolbar">
                <h1>AJAX</h1>
                <a class="back" href="#home">Home</a>
            </div>
            <ul class="rounded">
                <li class="arrow"><a href="#ajax_post">POST Form Example</a></li>
                <li class="arrow"><a href="ajax.html">GET Example</a></li>
                <li class="arrow"><a href="#callback">With Callback</a></li>
            </ul>
        </div>
        <div id="animations">
            <div class="toolbar">
                <h1>Animations</h1>
                <a class="back" href="#">Home</a>
            </div>
            <ul class="rounded">
                <li><a href="#animdemo">Slide</a></li>
                <li><a class="slideup" href="#animdemo">Slide Up</a></li>
                <li><a class="dissolve" href="#animdemo">Dissolve</a></li>
                <li><a class="fade" href="#animdemo">Fade</a></li>
                <li><a class="flip" href="#animdemo">Flip</a></li>
                <li><a class="pop" href="#animdemo">Pop</a></li>
                <li><a class="swap" href="#animdemo">Swap</a></li>
                <li><a class="cube" href="#animdemo">Cube</a></li>
            </ul>
            <div class="info">
                Custom animations are also <a href="http://code.google.com/p/jqtouch/wiki/Animations" target="_blank">easy to write</a>. <br />View the source in <code>demos/customanimation</code> to see how.
            </div>
        </div>
        <div id="animdemo">
            <div style="font-size: 1.5em; text-align: center; margin: 160px 0 160px; font-family: Marker felt;">
                Pretty smooth, eh?            
            </div>
            <a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#" class="whiteButton goback">Go back</a>
        </div>
        <div id="callback">
            <div class="toolbar">
                <h1>AJAX w/Callback</h1>
                <a class="back" href="#">Ajax</a>
            </div>
        </div>
        <div id="callbacks">
            <div class="toolbar">
                <h1>Events</h1>
                <a class="back" href="#home">Home</a>
            </div>
            <ul class="rounded">
                <li><a href="#pageevents">Page events</a></li>
                <li id="swipeme">Swipe me!</li>
                <li id="orient">Orientation: <strong>profile</strong></li>
            </ul>
        </div>
        <div id="demos">
            <div class="toolbar">
                <h1>Demos</h1>
                <a class="back" href="#home">Home</a>
            </div>
            <div class="info">
                These apps open in a new window. Don&#8217;t forget to save them to your home screen to enable full-screen mode.
            </div>
            <ul class="rounded">
                <li class="forward"><a target="_webapp" href="../todo/">To-Do app</a></li>
                <li class="forward"><a target="_webapp" href="../clock/">Clock app</a></li>
            </ul>
        </div>
        <div id="edge">
            <div class="toolbar">
                <h1>Edge to Edge</h1>
                <a href="#" class="back">Back</a>
            </div>
            <ul class="edgetoedge">
                <li class="sep">F</li>
                <li><a href="#">Flintstone, <em>Fred</em></a></li>
                <li><a href="#">Flintstone, <em>Pebble</em></a></li>
                <li><a href="#">Flintstone, <em>Wilma</em></a></li>
                <li class="sep">J</li>
                <li><a href="#">Jetson, <em>Elroy</em></a></li>
                <li><a href="#">Jetson, <em>George</em></a></li>
                <li><a href="#">Jetson, <em>Jane</em></a></li>
                <li><a href="#">Jetson, <em>Judy</em></a></li>
                <li class="sep">R</li>
                <li><a href="#">Rubble, <em>Bambam</em></a></li>
                <li><a href="#">Rubble, <em>Barney</em></a></li>
                <li><a href="#">Rubble, <em>Betty</em></a></li>
            </ul>
        </div>
        <div id="extensions">
            <div class="toolbar">
                <h1>Extensions</h1>
                <a class="back" href="#home">Home</a>
            </div>
            <div class="info">
                These apps open in a new window. Don&#8217;t forget to save them to your home screen to enable full-screen mode.
            </div>
            <ul class="rounded">
                <li class="forward"><a target="_webapp" href="../ext_location/">Geo Location</a></li>
                <li class="forward"><a target="_webapp" href="../ext_offline/">Offline Utility</a></li>
                <li class="forward"><a target="_webapp" href="../ext_floaty/">Floaty Bar</a></li>
                <li class="forward"><a target="_webapp" href="../ext_autotitles/">Auto Titles</a></li>
            </ul>
        </div>
        <div id="forms">
            <div class="toolbar">
                <h1>Forms</h1>
                <a href="#" class="back">Back</a>
            </div>
            <form>
                <ul class="edit rounded">
                    <li><input type="text" name="name" placeholder="Text" id="some_name" /></li>
                    <li><input type="text" name="search" placeholder="Search" id="some_name" /></li>
                    <li><input type="text" name="phone" placeholder="Phone" id="some_name"  /></li>
                    <li><input type="text" name="zip" placeholder="Numbers" id="some_name" /></li>
                    <li><textarea placeholder="Textarea" ></textarea></li>
                    <li>Sample Toggle <span class="toggle"><input type="checkbox" /></span></li>
                    <li>
                        <select id="lol">
                            <optgroup label="Swedish Cars">
                                <option value ="volvo">Volvo</option>
                                <option value ="saab">Saab</option>
                            </optgroup>
                            <optgroup label="German Cars">
                                <option value ="mercedes">Mercedes</option>
                                <option value ="audi">Audi</option>
                            </optgroup>
                        </select>
                    </li>
                    <li><input type="password" name="some_name" value="iphonedelcopon" id="some_name" /></li>
                    <li><input type="checkbox" name="some_name" value="Hello" id="some_name" title="V8 Engine Type" /></li>
                    <li><input type="checkbox" name="some_name" value="Hello" checked="checked" id="some_name" title="V12 Engine Type" /></li>
                    <li><input type="radio" name="some_name" value="Hello" id="some_name" title="Only cars" /></li>
                    <li><input type="radio" name="some_name" value="Hello" id="some_name" title="Only motorbikes" /></li>
                </ul>
            </form>
        </div>
        <div id="home" class="current">
            <div class="toolbar">
                <h1>jQTouch</h1>
                <a class="button slideup" id="infoButton" href="#about">About</a>
            </div>
            <ul class="rounded">
                <li class="arrow"><a href="#ui">User Interface</a> <small class="counter">4</small></li>
                <li class="arrow"><a href="#animations">Animations</a> <small class="counter">8</small></li>
                <li class="arrow"><a href="#ajax">AJAX</a> <small class="counter">3</small></li>
                <li class="arrow"><a href="#callbacks">Callback Events</a> <small class="counter">3</small></li>
                <li class="arrow"><a href="#extensions">Extensions</a> <small class="counter">4</small></li>
                <li class="arrow"><a href="#demos">Demos</a> <small class="counter">2</small></li>
            </ul>
            <h2>External Links</h2>
            <ul class="rounded">
                <li class="forward"><a href="http://www.jqtouch.com/" target="_blank">Homepage</a></li>
                <li class="forward"><a href="http://www.twitter.com/jqtouch" target="_blank">Twitter</a></li>
                <li class="forward"><a href="http://code.google.com/p/jqtouch/w/list" target="_blank">Google Code</a></li>
            </ul>
            <ul class="individual">
                <li><a href="&#109;&#097;&#105;&#108;&#116;&#111;:&#100;&#107;&#064;&#109;&#111;&#114;&#102;&#117;&#110;&#107;&#046;&#099;&#111;&#109;" target="_blank">Email</a></li>
                <li><a href="http://tinyurl.com/support-jqt" target="_blank">Donate</a></li>
            </ul>
            <div class="info">
                <p>Add this page to your home screen to view the custom icon, startup screen, and full screen mode.</p>
            </div>
        </div>
        <div id="metal">
            <div class="toolbar">
                <h1>Metal Lists</h1>
                <a href="#" class="back">Back</a>
            </div>
            <ul class="metal">
                <li class="arrow"><a href="#"><small>AM</small> 9:40 <em>Buenos Aires</em></a></li>
                <li class="arrow"><a href="#"><small>PM</small> 19:40 <em>Singapur</em></a></li>
                <li class="arrow"><a href="#"><small>PM</small> 22:40 <em>Japan</em></a></li>
                <li class="arrow"><a href="#"><small>PM</small> 11:40 <em>New York</em></a></li>
                <li class="arrow"><a href="#"><small>PM</small> 9:40 <em>Ontario</em></a></li>
            </ul>
        </div>
        <div id="pageevents">
            <div class="toolbar">
                <h1>Page Events</h1>
                <a class="back" href="#">Events</a>
            </div>
            <div class="info" style="font-weight: normal;">
            </div>
        </div>
        <div id="plastic">
            <div class="toolbar">
                <h1>Plastic Lists</h1>
                <a href="#" class="back">Back</a>
            </div>
            <ul class="plastic">
                <li class="arrow"><a href="#">Simple list</a></li>
                <li class="arrow"><a href="#">Contact list</a></li>
                <li class="arrow"><a href="#">Content List</a></li>
                <li class="arrow"><a href="#">Metal list</a></li>
            </ul>
            <div class="info">
                <p><strong>Best enjoyed on a real iPhone</strong></p>
            </div>
        </div>
        <div id="ui">
            <div class="toolbar">
                <h1>UI Demos</h1>
                <a class="back" href="#">Home</a>
            </div>

            <h2>Lists</h2>
            <ul class="rounded">
                <li class="arrow"><a href="#edge">Edge to Edge</a></li>
                <li class="arrow"><a href="#plastic">Plastic</a></li>
                <li class="arrow"><a href="#metal">Metal</a></li>
            </ul>
            <h2>Forms</h2>
            <ul class="rounded">
                <li class="arrow"><a href="#forms">Forms</a></li>
            </ul>
        </div>

        <form id="ajax_post" action="ajax_post.php" method="POST" class="form">
            <div class="toolbar">
                <h1>Post Demo</h1>
                <a class="back" href="#">Ajax</a>
            </div>
            <ul class="rounded">
                <li><input type="text" name="zip" value="" placeholder="Zip Code" /></li>
            </ul>
            <a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#" class="submit whiteButton">Submit</a>
        </form>
    </body>
</html>
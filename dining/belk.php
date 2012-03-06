<?php

$url = "http://www.nfl.com/teams/sandiegochargers/roster?team=SD";

$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,'http://www.nfl.com/teams/sandiegochargers/roster?team=SD');
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
$buf = curl_exec($curl_handle);
curl_close($curl_handle);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width,user-scalable=no" />
<link href="../css/core.css" rel="stylesheet" media="screen" type="text/css" />

<!-- Set the .png file that you want to use as a iPhone springboard icon -->
<link rel="apple-touch-icon" href="robert.png"/>

<script src="../javascript/functions.js" type="text/javascript"></script>
<title>Meredith College Dining</title>
<meta content="keyword1,keyword2,keyword3" name="keywords" />
<meta content="Description of your page" name="description" />
</head>

<body onload="scrollTo(0,1);">
<div id="wrapper">
<div class="toolbar">
			<div id="leftbutton"><a href="../index.php">Home</a></div>
            <h1>Dining</span></h1>
</div>  
 
<?
$newlines = array("\t","\n","\r","\x20\x20","\0","\x0B");
$content = str_replace($newlines, "", html_entity_decode($buf));
$start = strpos($content,'<table cellpadding="2" class="standard_table"');
$end = strpos($content,'</table>',$start) + 8;

$table = substr($content,$start,$end-$start);
preg_match_all("|<tr(.*)</tr>|U",$table,$rows);
foreach ($rows[0] as $row){

    if ((strpos($row,'<th')===false)){
    
        preg_match_all("|<td(.*)</td>|U",$row,$cells);
        
        $number = strip_tags($cells[0][0]);
        
        $name = strip_tags($cells[0][1]);
        
        $position = strip_tags($cells[0][2]);
        
        echo "{$position} - {$name} - Number {$number} <br>\n";
    
    }

}
?>


</div>
<div id="footer" align="center"><br><strong>Meredith College</strong><br>3800 Hillsborough Street | Raleigh, NC 27607<br><a href="../about/about.php" color="white"><strong>About This Site</strong></a></div>

</body>

</html>

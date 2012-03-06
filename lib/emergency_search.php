<?php
function emergency_search()
{
	$link = mysql_connect("localhost:3305", "enews", "3h32w");

	// check connection
	if (!$link)	{ die('Could not connect: ' . mysql_error()); }

	// select db
	$db_selected = mysql_select_db("enews", $link);
				
	if (!$db_selected)	{ die ("Can\'t use database : " . mysql_error()); }
	else
	{			
		$sql = "SELECT * FROM enews07 WHERE SubmitterType = 'CampusAlert' AND Displayed = 'Yes'";
		$result = mysql_query($sql);
		$num_results = mysql_num_rows($result);
	}
	
	if ($num_results > 0) { return 1; }
	else { return 0; }
}

?>

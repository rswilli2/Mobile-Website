<?php

function set_coordinates($building_name)
{
	switch ($building_name) {
	case "Alumnae House":
		$google_xy = "http://maps.google.com/maps?sll=35.796661081526665,-78.68937134742737";
		return $google_xy;
		break;
	case "Cate Student Center":
		$google_xy = "http://maps.google.com/maps?sll=35.79830794378396,-78.69114696979523";
		return $google_xy;
		break;
	case "Belk Dining Hall":
		$google_xy = "http://maps.google.com/maps?sll=35.7999025612329,-78.68817239999771";
		return $google_xy;
		break;		
	case "Johnson Hall":
		$google_xy = "http://maps.google.com/maps?sll=35.798423244618405,-78.68835747241974";
		return $google_xy;
		break;
	case "Jones Chapel":
		$google_xy = "http://maps.google.com/maps?sll=35.79719843663609,-78.68902266025543";
		return $google_xy;
		break;
	case "Noel House":
		$google_xy = "http://maps.google.com/maps?sll=35.80065091091031,-78.68874907493591";
		return $google_xy;
		break;
	case "Noel Annex":
		$google_xy = "http://maps.google.com/maps?sll=35.80052691159639,-78.68915677070618";
		return $google_xy;
		break;
	case "Science & Math Building":
		$google_xy = "http://maps.google.com/maps?sll=35.79769010249962,-78.69042813777924";
		return $google_xy;
		break;
	case "Carlyle Campbell Library":
		$google_xy = "http://maps.google.com/maps?sll=35.79931518881559,-78.68995070457458";
		return $google_xy;
		break;
	case "Ledford Hall":
		$google_xy = "http://maps.google.com/maps?sll=35.79690909202879,-78.69018137454987";
		return $google_xy;
		break;
	}
}
?>
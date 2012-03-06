<?

/**
 * Copyright (c) 2009 West Virginia University
 * 
 * Licensed under the MIT License
 * Redistributions of files must retain the above copyright notice.
 * 
 */

#######################################################
### Checks to see if device came from mobile site
### If so sets a cookie called mobi referral
### If not checks for cookie, if cookie not set fwd
### to m.institutionname.edu
#######################################################

class Mobile_Referrer {

	var $mobiledevice;

	public static function isMobileDevice ($server_string)
	{
		if (eregi("ipod",$server_string) || eregi("iphone",$server_string) || (eregi("android",$server_string) || eregi("opera mini",$server_string) || eregi("blackberry",$server_string) || preg_match("/(webOS|palm os|palm|hiptop|avantgo|plucker|xiino|blazer|elaine|windows ce; ppc;|windows ce; smartphone;|windows ce; iemobile|up.browser|up.link|mmp|symbian|smartphone|midp|wap|vodafone|o2|pocket|kindle|mobile|pda|psp|treo)/i", $server_string)))
		{
			return true;
		}
	}
}	
	
?>

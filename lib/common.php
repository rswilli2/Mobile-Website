<?php
/**
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
      * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

$service_url = "https://www.google.com/hosted/services/v1.0/reports/ReportingData";

$TWO_LEGGED_CONSUMER_KEY = 'meredith.edu';
$TWO_LEGGED_CONSUMER_SECRET_HMAC = 'lASZByXSFo/WQY4nnWB/JSgW';
$TWO_LEGGED_EMAIL_ADDRESS = 'williaroadm@meredith.edu';

/* No need to modify usually */
$THREE_LEGGED_SCOPES = array('https://mail.google.com/');

/**
 * Add the current directory to the include path
 */
$path = dirname(__FILE__);
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

/**
 * Uses libcurl to execute an HTTP POST to the specified
 * URL, containing the specified POST document.
 */
function ExecutePost($post_url, $post_document) {

  /* Create a cURL handle. */
  $ch = curl_init();

  
  /* Set cURL options. */
  curl_setopt($ch, CURLOPT_URL, $post_url);
  curl_setopt($ch, CURLOPT_POST, true);


  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_document);
 
  $result = curl_exec($ch);  /* Execute the HTTP request. */
  curl_close($ch);           /* Close the cURL handle. */

  return $result;
}

 function convertDate($varDate)
  {
  		$date_array = explode("-",$varDate); // split the array
  		$var_year = $date_array[0];
        $var_month = $date_array[1];
        $var_day = $date_array[2];
        
        switch($var_month)
        {
        	case 01:
        		$var_month = "January";
        		break;
            case 02:
        		$var_month = "February";
        		break;
        	case 03:
        		$var_month = "March";
        		break;
        	case 04:
        		$var_month = "April";
        		break;
        	case 05:
        		$var_month = "May";
        		break;
        	case 06:
        		$var_month = "June";
        		break;
        	case 07:
        		$var_month = "July";
        		break;
        	case 08:
        		$var_month = "August";
        		break;
        	case 09:
        		$var_month = "September";
        		break;
        	case 10:
        		$var_month = "October";
        		break;
        	case 11:
        		$var_month = "November";
        		break;
			default:
 				$var_month = "December";
 				break;
 		}
 		 		
 		switch($var_day)
 		{
 			case "01":
 				$var_day = "1";
 				break;
 			case "02":
 				$var_day = "2";
 				break;
 			case "03":
 				$var_day = "3";
 				break;
 			case "04":
 				$var_day = "4";
 				break;
 			case "05":
 				$var_day = "5";
 				break;
 			case "06":
 				$var_day = "6";
 				break;	
 			case "07":
 				$var_day = "7";
 				break;
 			case "08":
 				$var_day = "8";
 				break;
 			case "09":
 				$var_day = "9";
 				break;
			default:
				break;
 		}
 		
 		$formattedDate = $var_month . " " . $var_day . ", " . $var_year;
 		return $formattedDate; 
   }		

?>

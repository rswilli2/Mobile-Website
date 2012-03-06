<?php

/**
 * Copyright (C) 2007 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/* Include PHP file that contains the Google URL variable & function to execute the POST statement */
require_once("common.php");

/**
 * Obtains an authorization token for the specified domain
 * administrator.  The admin_email and admin_password
 * parameteters are always required.  captcha_token and
 * captcha_response should be the empty string unless
 * a CAPTCHA response is required.
 */
function GetAuthToken($admin_email, $admin_password, $captcha_token, $captcha_response) {

  $post_url = "https://www.google.com/accounts/ClientLogin";
  $post_data = "accountType=HOSTED&Email=" . urlencode($admin_email) . "&Passwd=" . urlencode($admin_password);
  
        
 if ( $captcha_token != "" ) {
    $post_data .= "&logintoken=" . urlencode($captcha_token);
  }
  if ( $captcha_response != "" ) {
    $post_data .= "&logincaptcha=" . urlencode($captcha_response);
  }
  
  $result = ExecutePost($post_url, $post_data);

  /*
   * If we were successful, return the authentication token
   * in the "SID=..." line.  If CAPTCHA authentication is
   * required, return an error message indicating as much.
   * Otherwise, just return whatever error message we got.
   */
  if ( $result && preg_match('/^SID=(\S+)/', $result, $parsed_sid_line) )
  {
    return $parsed_sid_line[1];
  } 
  else if ( $result && preg_match('/Error=CaptchaRequired/', $result) && preg_match('/CaptchaToken=(\S+)/', $result, $token) && preg_match('/CaptchaUrl=(\S+)/', $result, $url) ) {
	$full_url = "https://www.google.com/accounts/" . $url[1];
     return "Authentication failed. Please retry with token " .$token[1] . " and the text you see at " . $full_url;
  } 
  else {
    return $result;
  }
}

?>

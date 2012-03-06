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

require_once("common.php");


/**
 * Retrieves specified report for the domain and date specified.
 * An authorization token (obtained with GetAuthToken()) and
 * the domain must also be provided.
 * $report_name can be one of the following values:
 *     - accounts
 *     - activity
 *     - disk_space
 *     - email_clients
 *     - quota_limit_accounts
 *     - summary
 *     - suspended_accounts
 */
function RetrieveReport($token, $domain, $date, $report_name, $report_description) {
  global $service_url;

  /* Set up the XML document to POST. */
  $post_document  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
  $post_document .= '<rest xmlns="google:accounts:rest:protocol"' .
    ' xmlns:xsi=" http://www.w3.org/2001/XMLSchema-instance">' . "\n";
  $post_document .= '  <type>Report</type>' . "\n";
  $post_document .= '  <token>' . $token . '</token>' . "\n";
  $post_document .= '  <domain>' . $domain . '</domain>' . "\n";
  $post_document .= '  <date>' . $date . '</date>' . "\n";
  $post_document .= '  <reportType>daily</reportType>' .
    "\n";
  $post_document .= '  <reportName>' . $report_name . '</reportName>' . "\n";
  $post_document .= '</rest>' . "\n";

  /* Execute the POST. */
  $result = ExecutePost($service_url, $post_document);

  if ( !$result ) {
    return "Unable to retrieve " . $report_description .
      " Report. (Unknown error)";
  } else {
    return $result;
  }
}


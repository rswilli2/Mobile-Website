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

/*
 * navigation.php provides functions to display navigation menu in
 * reportingdemo.php
 */

/*
 * Defines the CSS properties for the menu
 */
function NavigationCss() {
?>
  <style type="text/css">
   body {
     font-family: arial;
     font-size: 90%;
   }
   .btable {
     border: 1px solid;
     border-color: #ccc;
   }
   .note {
     font-size: 75%;
     color: green;
   }
   .navigation-off, .navigation-on {
      padding: 2px;
      padding-left:15px;
      font-family: arial;
    }
    .navigation-off { background: #ddf; }
    .navigation-on { background: #999; }
    .navigation-off a { text-decoration: none; }
    .navigation-on a { font-weight: bold; text-decoration: none; color: white }
  </style>

<?php
}

/*
 * Displays navigation-on style for the current page
 */
function NavigationItem($id, $name, $page, $domain = '', $token = '') {
  $class = "navigation-off";
  if ( $page == $id )
    $class = "navigation-on";
?>
    <td class="<?php echo($class); ?>">
      <a href="reportingdemo.php?page=<?php echo( $id ); ?>
&domain=<?php echo( $domain ) ?>&token=<?php echo( $token ) ?>">
        <?php echo( $name ); ?>
      </a>
    </td>
<?php
}

/*
 * Displays all of the navigation items
 */
function PageNavigation($page, $domain, $token) {
?>
<table width="300">
  <tr>
    <?php NavigationItem('get_report', 'Get Domain Reports', $page, $domain,
                       $token); ?>
    <?php NavigationItem('home', 'Logout', $page); ?>
  </tr>
</table>
<?php
}
?>

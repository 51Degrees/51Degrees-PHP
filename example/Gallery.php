<?php

/* *********************************************************************
 * This Source Code Form is copyright of 51Degrees Mobile Experts Limited. 
 * Copyright 2014 51Degrees Mobile Experts Limited, 5 Charlotte Close,
 * Caversham, Reading, Berkshire, United Kingdom RG4 7BY
 * 
 * This Source Code Form is the subject of the following patent 
 * applications, owned by 51Degrees Mobile Experts Limited of 5 Charlotte
 * Close, Caversham, Reading, Berkshire, United Kingdom RG4 7BY: 
 * European Patent Application No. 13192291.6; and 
 * United States Patent Application Nos. 14/085,223 and 14/085,301.
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0.
 * 
 * If a copy of the MPL was not distributed with this file, You can obtain
 * one at http://mozilla.org/MPL/2.0/.
 * 
 * This Source Code Form is "Incompatible With Secondary Licenses", as
 * defined by the Mozilla Public License, v. 2.0.
 * ********************************************************************* */

require_once 'ExampleMaster.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>51Degrees Image Optimser Gallery</title>
<?php fiftyone_degrees_echo_header(); ?>
</head>
<body>
<?php fiftyone_degrees_echo_menu(); ?>
<div class="content">
<?php

require_once '../core/51Degrees.php';

$headers = fiftyone_degrees_get_headers();
$use_auto = fiftyone_degrees_get_dataset_name($headers) === 'Ultimate';

$files = scandir('Gallery');

echo '<table id="body_Images" class="gallery" cellspacing="0" style="border-collapse:collapse;">';
echo '<tbody>';
$row_count = 0;
foreach ($files as $file) {
  
  if (ends_with($file, '.jpg')) {
    if ($row_count == 0)
      echo '<tr>';
    $img = get_image_panel($use_auto, $file);
    echo $img;
    $row_count++;
    if ($row_count == 3) {
      echo '</tr>';
      $row_count = 0;
    }
  }
}

echo '</tbody>';
echo '</table>';

function ends_with($haystack, $needle) {
  $length = strlen($needle);
  if ($length == 0) {
      return TRUE;
  }

  return (substr($haystack, -$length) === $needle);
}

function get_image_panel($use_auto, $image_name) {
  $output = '<td style="width: 33.3%;">';
  $output .= "<a href=\"GalleryImage.php?image=$image_name\" style=\"max-width: 200px;\" >";
  if ($use_auto) {
    $output .= "<img src=\"E.gif\" data-src=\"../core/ImageHandler.php?src=../example/Gallery/$image_name&width=auto\" />";
  }
  else {
    $output .= "<img src=\"../core/ImageHandler.php?src=../example/Gallery/$image_name&width=500\" />";
  }
  $output .= "</a>";
  $output .= "</td>";
  return $output;
}

?>
</div>
<script src="../core/51Degrees.core.js.php"></script>
<?php
if ($use_auto) {
?>
<script>
  new FODIO();
</script>
<?php
}
?>
</body>
</html>

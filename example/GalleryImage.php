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

<html>
<head>
<title>51Degrees Image Optimser Gallery</title>
<?php fiftyone_degrees_echo_header(); ?>
</head>
<body>
<?php fiftyone_degrees_echo_menu(); ?>
<div id="Content">
<?php

require_once '../core/51Degrees.php';

$headers = fiftyone_degrees_get_headers();
$use_auto = fiftyone_degrees_get_dataset_name($headers) === 'Ultimate';
$file = $_GET['image'];

$path = 'Gallery/' . $file;

if (file_exists($path)) {
  $img = get_image_panel($use_auto, $file);
   echo $img;
}

function get_image_panel($use_auto, $image_name) {
  if ($use_auto) {
    $output = "<img src=\"E.gif\" data-src=\"../core/ImageHandler.php?src=../example/Gallery/$image_name&width=auto\" class=\"GalleryImage\"/>";
  }
  else {
    if (array_key_exists('ScreenPixelsWidth', $_51d) && is_numeric($_51d['ScreenPixelsWidth']))
      $width = $_51d['ScreenPixelsWidth'];
    else
      $width = 800;
    $output = "<img src=\"../core/ImageHandler.php?src=../example/Gallery/$image_name&width=$width\" class=\"GalleryImage\" />";
  }
  return $output;
}

?>
</div>
<script src="../core/51Degrees.core.js.php"></script>
<script>
  new FODIO();
</script>
</body>
</html>
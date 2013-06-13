Description
4 Steps - Download, Unzip, Include, Go Mobile with PHP

Add mobile device detection to PHP the easy way with 51Degrees.mobi. No cloud services, no external plug-ins, all Mozilla Public Licence source code. It's a great alternative to WURFL or DeviceAtlas.

Step 1 - Download the Zip file from SourceForge.

Step 2 - Unzip the file into a directory of your choice within your project.

Step 3 - Then add the following code to your PHP page file:

include_once('path/to/51Degrees.mobi.php');
include_once('path/to/51Degrees.mobi.usage.php');

(It is recommended for performance purposes that these lines are included after a session_start();)

Step 4 - Get the details about the device that is accessing your site with code like this:

if($_51d[‘IsMobile’] == ‘True’)
{
//Start coding for a mobile device here.
}

Read the full user guide on our web site.

RECENT CHANGES

1. $_51D -> $_51d
2. $_51DMetaData -> $_51d_meta_data
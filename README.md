
![51Degrees](https://51degrees.com/DesktopModules/FiftyOne/Distributor/Logo.ashx?utm_source=github&utm_medium=repository&utm_content=home&utm_campaign=native-php "THE Fastest and Most Accurate Device Detection") **Device Detection in Native PHP**

##Important Information

Please note that the native PHP API is no longer actively developed. Instead please use the C-Extension or the Cloud Implementation.

Since native PHP is not capable of persistently storing data in memory the API is only capable of working in stream mode which relies on loading the bare minimum of the necessary headers and then using the data file on disk to perform detection. Normally in languages like Java and C# the headers would only be loaded once, upon the application start, and then reused for multiple detections However with native PHP this has to be done for every request which is slow and inefficient.

If you have root access to the server your website/service is running on consider using the C-Extension implementation.

If you are running in an environment with restricted access rights such as a WordPress blog on shared hosting then you should use the Cloud implementation.

This API is still maintained and is in the working order, but maintenance is only limited to bug fixes.

Also please note that the native PHP API requires files of version 3.1.

## Usage
### Basic Usage
```php
<?php
require_once 'core/51Degrees.php';

// Detection results are stored in the $_51d global.
$isMobile = $_51d['IsMobile'];

// Use like:
if ($isMobile) {
    echo "<h3>Mobile device.</h3>";
} else {
    echo "<h3>Non-Mobile device.</h3>";
}
?>
```

###Match Metrics
```php
<?php
require_once 'core/51Degrees.php';

// Match metrics:
echo "<p>DeviceId: ".$_51d["DeviceId"]."</p>";
echo "<p>Method: ".$_51d["Method"]."</p>";
echo "<p>Difference: ".$_51d["debug_info"]["difference"]."</p>";
?>
```

###Metadata
To retrieve description for a particular property:
```php
<?php
require_once 'core/51Degrees_metadata.php';

// $_51d_meta_data global contains metadata for properties and values.

// Print description for the IsMobile property.
echo $_51d_meta_data['IsMobile']['Description'];
?>
```

To print all possible values for a chosen property:
```php
<?php
require_once 'core/51Degrees_metadata.php';

// Shows all possible valus for the IsMobile property and a 
// description for each value.
echo "<pre>";
    var_dump($_51d_meta_data['IsMobile']['Values']);
echo "</pre>";
?>
```

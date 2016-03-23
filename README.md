
![51Degrees](https://51degrees.com/DesktopModules/FiftyOne/Distributor/Logo.ashx?utm_source=github&utm_medium=repository&utm_content=home&utm_campaign=native-php "THE Fastest and Most Accurate Device Detection") **Device Detection in Native PHP**

##Important Information

Please note that the native PHP API is no longer actively developed. Instead please use the C-Extension or the Cloud Implementation.

Since native PHP is not capable of persistently storing data in memory the API is only capable of working in stream mode which relies on loading the bare minimum of the necessary headers and then using the data file on disk to perform detection. Normally in languages like Java and C# the headers would only be loaded once, upon the application start, and then reused for multiple detections However with native PHP this has to be done for every request which is slow and inefficient.

If you have root access to the server your website/service is running on consider using the C-Extension implementation.

If you are running in an environment with restricted access rights such as a WordPress blog on shared hosting then you should use the Cloud implementation.

This API is still maintained and is in the working order, but maintenance is only limited to bug fixes.

Also please note that the native PHP API requires files of version 3.1.

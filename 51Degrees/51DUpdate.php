<?php
/**
 * See LICENSE.TXT for terms of use and copyright.
 */
/**
 * These Premium Data Licence Terms, together with our General Terms and
 * Conditions, apply to your (and your End Users?) use of Premium Data. In the
 * event of any inconsistency between these Premium Data Licence Terms and our
 * General Terms and Conditions, these Premium Data Licence Terms will prevail
 * as regards your use of Premium Data.
 *
 * Please note that our General Terms and Conditions contain provisions which
 * limit our liability to you. Our General Terms and Conditions also set out
 * the definitions used in these Premium Data Licence Terms.
 *
 * 1	GRANT OF LICENCE
 *
 * In consideration of your agreeing to pay the Data Licence Fees, we grant you
 * a non-exclusive, non-transferable licence to use the Premium Data in
 * conjunction with Relevant Software on the terms of this licence.
 *
 * 2	SCOPE OF LICENCE
 *
 * This agreement is granted for the number of Instances set out in your Order
 * or as otherwise agreed by us from time to time.
 *
 * An Instance means a single installation of Relevant Software for a single
 * End User. So (by way of example):
 *
 * a.	if Relevant Software is installed in two or more virtual servers on the
 * same physical server, each installation of Relevant Software will be a
 * separate Instance;
 *
 * b.	if the same server (whether physical or virtual) has two different
 * installations of Relevant Software on it, each will be a separate Instance; and
 *
 * c.	if the same installation of Relevant Software is made available to two
 * different End Users, that will constitute two Instances.
 *
 * You (and any End Users) are also entitled to make a reasonable number of
 * back-up copies of any Relevant Software.
 *
 * 3	PERMITTED USE
 *
 * You are only permitted to use the Premium Data for purposes of real-time
 * device property detection using Relevant Software.
 *
 * All other use without our consent is prohibited, including without
 * limitation using the Premium Data for offline data analysis, for the purpose
 * of creating a database of device properties, or for providing any hosted or
 * cloud-based services to any person. If you require a licence for offline
 * data analysis or hosted or cloud-based services then we may (at our
 * discretion) allow this upon payment of further Data Licence Fees.
 *
 * 4	DURATION OF LICENCE
 *
 * This agreement will continue for the Initial Term as set out in your Order
 * or as otherwise agreed by us from time to time. It will then automatically
 * renew for Renewal Terms of the same length as the Initial Term (or as
 * otherwise set out in your Order or as otherwise agreed by us from time to
 * time) unless terminated by either you or us giving the other not less than
 * three months? notice of termination, such notice to expire on the last day
 * of the Initial Term or a Renewal Term.
 *
 * This is subject to the Termination provisions in condition 10 of the General
 * Terms and Conditions.
 *
 * 5	DATA LICENCE FEES
 *
 * You must pay the Data Licence Fees on or before the start of the Initial
 * Term or the applicable Renewal Term, using the renewal payment interface on
 * our website.
 *
 * We may revise the Data Licence Fees for the next Renewal Term by giving you
 * not less than four months? notice in writing prior to the start of that
 * Renewal Term.
 *
 * If you fail to pay the Data Licence Fees in full when due, your licence to
 * use the Premium Data and your access to our website (other than to pay the
 * outstanding Data Licence Fees) will automatically be suspended.
 *
 * 6	END USERS
 *
 * You may make the Premium Data available to an End User as part of any
 * Relevant Software that you supply to that End User.
 *
 * You are responsible for ensuring that the End User uses the Premium Data
 * strictly in accordance with the terms of this licence, and that the End User
 * only uses the number of Instances that you allocate to it (which must, in
 * any event, be within your permitted number of Instances under this licence).
 * If an End User exceeds that number of Instances then you will be deemed to
 * have purchased the excess number of instances (Excess Instances) at the time
 * of your most recent Order for Premium Data or (if later) the start of the
 * current Renewal Term (Deemed Order Date), and you will pay us on demand the
 * additional Licence Fees in respect of those Excess Instances from the Deemed
 * Order Date. You agree that this is a reasonable pre-estimate of our loss
 * arising from your breach and not a penalty.
 *
 * For other ways in which your customers can make use of Premium Data in any
 * Relevant Software, see our Licence Key page.
 *
 * 7	IDENTIFICATION OF THE PREMIUM DATA
 *
 * Please note that we apply unique identifying data to the Premium Data as
 * supplied to you, to identify you as the licensee for that Premium Data that
 * has been supplied to you. We reserve the right to charge additional Data
 * Licence Fees if we become aware that Premium Data bearing the identifying
 * data assigned to you has been made available other than in accordance with
 * the terms of this agreement.
 *
 * 8	UPDATES
 *
 * This licence entitles you to any updates to the Premium Data released by us
 * during the term of this licence. The 51D Software will check our servers at
 * regular intervals for updates. You may also download the latest version of
 * the Premium Data from our website.
 *
 * 9	YOUR ACCOUNT
 *
 * You will maintain an account on our website at all times during the term of
 * this licence. You must not share your login details for your account with
 * anyone else, and we reserve the right to suspend access to your account if
 * we suspect that it is being used by anyone other than you or is being
 * misused in any other way.
 *
 * Copyright 51Degrees Mobile Exports Limited 2012 - All Rights Reserved
 */
/**
 * This Source Code Form is subject to the terms of the Mozilla Public License,
 * v. 2.0.
 *
 * If a copy of the MPL was not distributed with this file, You can obtain one
 * at http://mozilla.org/MPL/2.0/.
 *
 * This Source Code Form is "Incompatible With Secondary Licenses", as defined
 * by the Mozilla Public License, v. 2.0.
 */

global $_51d_suppress_update_output;

if((isset($_51d_suppress_update_output) && $_51d_suppress_update_output == true) == false)
{
	set_time_limit(0);

	header('Content-Type: text/plain');
	header('Cache-Control: no-cache, must-revalidate');
	header('Access-Control-Allow-Origin: *');

	@apache_setenv('no-gzip', 1);
	@ini_set('zlib.output_compression', 0);
	@ini_set('implicit_flush', 1);
	for ($i = 0; $i < ob_get_level(); $i++) { ob_end_flush(); }
	ob_implicit_flush(1);

	for($p = 0; $p < 2048; $p++)
	{
		echo(' ');
	}
	flush();

	fiftyone_degrees_WriteMessage('Getting update');

	if(fiftyone_degrees_StartUpdate())
		fiftyone_degrees_WriteMessage('The update successful.');
	else
		fiftyone_degrees_WriteMessage('The update was not successful.');

}

/**
 * Initiates updating the php code and data if premium licence key enabled.
 */
function fiftyone_degrees_StartUpdate() {
  @set_time_limit(0);
  $time = microtime();
  $time = explode(' ', $time);
  $time = $time[1] + $time[0];
  $start = $time;
  $dir = dirname(__FILE__);
  $body_post = "";
  $php_current = "phpCurrent=";
  $premium_license_key = fiftyone_degrees_get_licenses($dir);
  $keys_valid = TRUE;

  foreach ($premium_license_key as $key) {
    if (!preg_match("#^[A-Z\d]+$#", $key)) {
      $keys_valid = FALSE;
    }
  }

  $premium_license_key = implode('|', $premium_license_key);

  if ($keys_valid) {
  fiftyone_degrees_WriteMessage('License file retrieved.');
    if ($premium_license_key !== "") {
      fiftyone_degrees_remove_old_files($dir);
      $url = 'http://51degrees.mobi/devicedata/getdelta.ashx?LicenseKeys=' . $premium_license_key;
	    if(!fiftyone_degrees_get_php_file_arrays($dir, $php_current)) {
		fiftyone_degrees_WriteMessage('Could not retrieve update information. Failed to get php file arrays.');
		return false;
		}
      $update_file = fiftyone_degrees_download($url, $php_current, $dir);
	  if($update_file == false) {
		fiftyone_degrees_WriteMessage('The update could not be downloaded. You may need to lower secuirty settings to allow the server to download external files via HTTP.');
	  }

	  elseif ($update_file == "NoData") {
		fiftyone_degrees_WriteMessage("No updates available. Please try again later.");
		return true;
      }

      elseif (substr($update_file, 0, 8) == "[!FAILED") {
        $error_message = explode('|', $update_file);
        fiftyone_degrees_WriteMessage('There has been a problem with the update. ' . $error_message[1]);
      }
      else {
        fiftyone_degrees_do_update($php_current, $update_file, $url, $dir);
        fiftyone_degrees_WriteMessage("Updates have been applied, thank you for using 51Degrees.mobi!");
        return true;
      }

	  fiftyone_degrees_PrintAlternateSource($premium_license_key);
    }
    else {
      fiftyone_degrees_WriteMessage("Please check that your license file(s) are included in the 51Degrees directory, they appear not to be present.");
    }
  }
  else {
    fiftyone_degrees_WriteMessage("Please check your license(s), they appear to be invalid.");
  }

  return false;
}

function fiftyone_degrees_PrintAlternateSource($licenseKey) {
	fiftyone_degrees_WriteMessage('Alternatively, you can download the data manually from <a href="https://51degrees.mobi/Products/Downloads/Premium.aspx?LicenseKeys='.$licenseKey.'">51Degrees.mobi</a> and place the unzipped contents in '. dirname(__FILE__).'.');
}

/**
 * Retrieves the licence key if available.
 *
 * @param string $dir
 *   Directory to search for licence file.
 * @return array
 *   Array of licence keys. Empty if no licence.
 */
function fiftyone_degrees_get_licenses($dir) {
  $licenses = array();
  foreach (glob($dir . '/*.lic') as $file) {
    $licenses[] = file_get_contents($file);
  }
  return $licenses;
}

/**
 * Adds php hash codes to working list.
 *
 * @param string $dir
 *   Update working directory.
 * @param string &$php_current
 *   List of hash codes to be added to.
 */
function fiftyone_degrees_get_php_file_arrays($dir, &$php_current) {
  $update_hashes_file = $dir . '/UpdateHash.txt';
  $update_lengths_file = $dir . '/UpdateLengths.txt';

  $current_hash = "";

  if (fiftyone_degrees_write_update_hash_file($dir, $current_hash))
  {
	$php_current .= $current_hash;
	return true;
  }
  else
	return false;
}

/**
 * Records current hash codes in working file.
 *
 * @param string $dir
 *   Update working directory.
 * @param string &$current_hash
 *   Current hashcode string
 */
function fiftyone_degrees_write_update_hash_file($dir, &$current_hash) {
  $dirlengths = "";
  $filename = $dir . '/UpdateHash.txt';
  fiftyone_degrees_php_file_arrays_processor($dir, $current_hash, $dirlengths);
  $fh = fopen($filename, 'w');
  fwrite($fh, $current_hash);
  fclose($fh);
  $dirlengths = fiftyone_degrees_shorten_lengths_var($dirlengths);
  $fh = @fopen($dir . '/UpdateLengths.txt', 'w+');
  fwrite($fh, $dirlengths);
  fclose($fh);
  if (!file_exists($filename) || !file_exists($dir . '/UpdateLengths.txt')) {
    fiftyone_degrees_WriteMessage('You do not have permissions set to update these files. Please change your permissions and try again.');
	return false;
  }
  return true;
}

/**
 * Adds hashcodes for files in the target directory.
 *
 * @param string $dir
 *   Update working directory.
 * @param string &$current_hash
 *   Current hashcode string
 * @param int &$dirlengths
 *
 * @param bool $is_subdir
 *
 */
function fiftyone_degrees_php_file_arrays_processor($dir, &$current_hash, &$dirlengths) {
	foreach (glob($dir . '/*') as $file) {
		if (is_dir($file)) {
			fiftyone_degrees_php_file_arrays_processor($file, $current_hash, $dirlengths);
		}
		else {
			$file_no_dir = str_replace(dirname(__FILE__), "", $file);

			// check that no excluded files are submitted
			if( 	ends_with($file_no_dir, ".zip") == false &&
					ends_with($file_no_dir, ".lic") == false &&
					ends_with($file_no_dir, ".oldphp") == false &&
					$file_no_dir != "UpdateHash.txt" &&
					$file_no_dir != "UpdateLengths.txt" &&
					$file_no_dir != "51DUpdate.php") {
				$this_hash = $file_no_dir . md5_file($file);
				$dirlengths .= (strlen($this_hash) - 32) . '-';
				$current_hash .= $this_hash;
			}
		}
	}
}

function ends_with($string, $test) {
    $strlen = strlen($string);
    $testlen = strlen($test);
    if ($testlen > $strlen) return false;
    return substr_compare($string, $test, -$testlen) === 0;
}

/**
 * Unpacks the length of new files.
 *
 * @param string $dirlengths
 *   File lengths, hyphen seperated.
 * @return array
 *   Pipe seperated list of lengths.
 */
function fiftyone_degrees_shorten_lengths_var($dirlengths) {
  $ctr = 0;
  $vals = array();
  $prev = 0;
  foreach (explode('-', $dirlengths) as $len) {
    if ($prev != 0 && $len != $prev) {
      $vals[] = $prev . '*' . $ctr;
      $ctr = 1;
      $prev = $len;
    }
    elseif ($prev != 0) {
      $ctr++;
    }
    else {
      $prev = $len;
      $ctr++;
    }
  }
  return implode('|', $vals);
}

/**
 * Downloads the update file content. Returns a string containing update data if successful, false if there was a failure and "NoData" if there is no
 * new data to add.
 *
 * @param string $url
 *   URL to download update from.
 * @param string $data
 *   Current file hashcodes.
 * @param string $dir
 *   Working directory.
 * @param $optional_headers
 *   Optional HTTP headers.
 * @return string
 *   New file content.
 */
function fiftyone_degrees_download($url, $data, $dir, $optional_headers = NULL) {
	$params = array(
		'http' => array(
		'method' => 'POST',
		'header' => "Content-type: application/x-www-form-urlencoded\r\n"
			."Content-Length: ".strlen($data)."\r\n"
			."Hash-Length: " . file_get_contents($dir . "/UpdateLengths.txt") . "\r\n",
		'content' => $data
			)
		);

	if ($optional_headers != NULL) {
		$params['http']['header'] = $optional_headers;
	}

	$ctx = stream_context_create($params);
	stream_context_set_params($ctx, array("notification" => "fiftyone_degrees_Stream_Notification"));

	try {
		ini_set('user_agent', $_SERVER['HTTP_USER_AGENT']);
		$fp = @fopen($url, 'rb', FALSE, $ctx);
		$response = @stream_get_contents($fp);
	}
	catch (Exception $e) {
		fiftyone_degrees_WriteMessage('There was a problem trying to run the update. Exception: ' . $e->getMessage());
		return false;
	}
	fiftyone_degrees_WriteMessage('Download complete.');
	if($response == "")
		return "NoData";
	return $response;
}

/**
 * Provides notification messages during update download.
 */
function fiftyone_degrees_Stream_Notification($notification_code, $severity, $message, $message_code, $bytes_transferred, $bytes_max) {
    global $_51d_download_percentage;
    switch($notification_code) {
	    case STREAM_NOTIFY_RESOLVE:
        case STREAM_NOTIFY_AUTH_REQUIRED:
        case STREAM_NOTIFY_FAILURE:
        case STREAM_NOTIFY_AUTH_RESULT:
        case STREAM_NOTIFY_REDIRECTED:
		case STREAM_NOTIFY_MIME_TYPE_IS:
		case STREAM_NOTIFY_COMPLETED:
			break;

        case STREAM_NOTIFY_CONNECT:
            fiftyone_degrees_WriteMessage('Connecting to upgrade server...');
			$_51d_download_percentage = 0;
            break;

        case STREAM_NOTIFY_FILE_SIZE_IS:
            // get MB
			if($bytes_max == 0)
				$mbytes = 0.00;
			else
				$mbytes = number_format($bytes_max / 1000000, 2);

            fiftyone_degrees_WriteMessage("Downloading $mbytes MB.");
            break;

        case STREAM_NOTIFY_PROGRESS:
			$percentage = ($bytes_transferred / $bytes_max) * 100;
			if($percentage > $_51d_download_percentage + 10) {
				$_51d_download_percentage += 10;
				fiftyone_degrees_WriteMessage("Download ".$_51d_download_percentage."% complete.");
			}
            break;
    }
}

/**
 * Initiates the update process.
 *
 * @param $php_current
 *   Current hashcode of current files.
 * @param &$update_file
 *   The update file content.
 * @param $url
 *   URL to download the update file from.
 * @param $dir
 *   The working directory.
 */
function fiftyone_degrees_do_update($php_current, &$update_file, $url, $dir) {
fiftyone_degrees_WriteMessage('Updating files...');
  //fiftyone_degrees_double_check($php_current, $update_file, $url, $dir);
  $linevars = explode('!]', $update_file);

  array_pop($linevars);
  $update_length = count($linevars);
  $counter = 0;
  $percent_complete = 0;
  $delete_files = array();
  foreach ($linevars as $value) {
    $vals = explode('|', $value);
    if (trim($vals[0]) != "[!DELETE") {
      $text = array();
      for ($i = 2; $i < count($vals); $i++) {
        $text[] = $vals[$i];
      }
      $res = fiftyone_degrees_create_update_file($dir . '/' . $vals[1], implode('|', $text));
      if ($res != "") {
        fiftyone_degrees_rollback_update($dir);
        fiftyone_degrees_WriteMessage('Problem occured while updating - ' . $res);
		fiftyone_degrees_WriteMessage('Rolling back data.');
      }
    }
    else {
      $delete_files[] = $vals[1];
    }
	$counter++;
	$percent = number_format(($counter / $update_length) * 100, 0);
	if($percent > $percent_complete + 10) {
		$percent_complete += 10;
		fiftyone_degrees_WriteMessage("File updating ".$percent_complete."% complete.");
	}
  }
  fiftyone_degrees_WriteMessage('File update complete.');
  fiftyone_degrees_WriteMessage('Removing old files...');
  try {
    fiftyone_degrees_delete_marked($delete_files, $dir);
  }
  catch (Exception $e) {
    fiftyone_degrees_WriteMessage('Problem occured while updating - ' . $e->getMessage());
  }
  fiftyone_degrees_remove_old_files($dir);
  fiftyone_degrees_WriteMessage('File removal complete.');
  $current_hash = "";
  fiftyone_degrees_write_update_hash_file($dir, $current_hash);
}

/**
 * Ensures the latest update file will be used.
 *
 * @param $php_current
 *   Current file hash codes.
 * @param &$update_file
 *   Update file content.
 * @param $url
 *   URL to download update from
 * @param $dir
 *   Directory to store update file
 */
function fiftyone_degrees_double_check($php_current, &$update_file, $url, $dir) {
	$checking = fiftyone_degrees_download($url, $php_current, $dir);
	fiftyone_degrees_WriteMesssage("Finished checking.");
	if ($checking != $update_file) {
		$update_file = $checking;
		fiftyone_degrees_double_check($php_current, $update_file, $url, $dir);
	}
}

/**
 * Creates a new file containing updated content.
 *
 * @param string $file_directory
 *   Full path of file.
 * @param string $file_contents
 *  Contents to update.
 */
function fiftyone_degrees_create_update_file($file_directory, $file_contents) {
  try {
    $directory = explode('\\', $file_directory);
    $checking_dir = "";
    for ($i = 0; $i < count($directory) - 1; $i++) {
      $checking_dir .= $directory[$i] . '/';

	  if (!is_dir($checking_dir)) {
        mkdir($checking_dir);
      }
    }
    if (file_exists($file_directory)) {
      $fh = @fopen($file_directory . 'upd', 'w+', FALSE) or die("Problem creating file: your permissions will not allow writing.");
      fwrite($fh, $file_contents);
      fclose($fh);
      if (file_exists($file_directory)) {
        rename($file_directory, $file_directory . 'old');
      }
      rename($file_directory . 'upd', $file_directory);
    }
    else {
      $fh = @fopen($file_directory, 'w+', FALSE) or die("Problem creating file: your permissions will not allow writing.");
      fwrite($fh, $file_contents);
      fclose($fh);
    }
    return "";
  }
  catch (Exception $e) {
    return $e->getMessage();
  }
}

/**
 * Removes files during update.
 *
 * @param array $delete_files
 *   Array of files to remove.
 */
function fiftyone_degrees_delete_marked($delete_files, $dir) {
  foreach ($delete_files as $to_delete) {
    if (file_exists($dir . '/' . $to_delete)) {
      unlink($dir . '/' . $to_delete);
    }
  }
}

/**
 * Rolls back to previous version.
 *
 * @param string $dir
 *   Target directory.
 */
function fiftyone_degrees_rollback_update($dir) {
  foreach (glob($dir . '/*') as $file) {
    if (is_dir($file)) {
      fiftyone_degrees_rollback_update($file);
    }
    else {
      if (substr($file, strlen($file) - 3, strlen($file)) == "old") {
        try {
          rename($file, substr($file, 0, strlen($file) - 3));
        }
        catch (Exception $e) {
        }
      }
    }
  }
}

/**
 * Removes old files after update.
 *
 * @param string $dir
 *   Target directory.
 */
function fiftyone_degrees_remove_old_files($dir) {
  foreach (glob($dir . '/*') as $file) {
    if (is_dir($file)) {
      fiftyone_degrees_remove_old_files($file);
    }
    else {
      if (substr($file, strlen($file) - 3, strlen($file)) == "old") {
        try {
          unlink($file);
        }
        catch (Exception $e) {
        }
      }
    }
  }
}

/**
 * Writes a status message to the output stream.
 *
 * $message string
 *   The message to the written.
 */
function fiftyone_degrees_WriteMessage($message) {
	if((isset($_51d_suppress_update_output) && $_51d_suppress_update_output == true) == false) {
		echo $message . "\r\n";
		@flush();
	}
}
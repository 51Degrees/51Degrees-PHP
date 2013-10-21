<?php
/**
 * See LICENSE.TXT for terms of use and copyright.
 */

fiftyone_degrees_SendDetails();

/**
 * Sends usage details to 51Degrees.mobi.
 *
 * Sends usage details to 51Degrees.mobi about the request for subsequent
 * analysis and product improvement.
 */
function fiftyone_degrees_SendDetails() {
  if (extension_loaded('sockets') || extension_loaded('php_sockets')) {

    $server_ip = 'udp.devices.51degrees.mobi';
    $server_port = 80;

    // Get the ip address of the requesting client.
    if (function_exists('ip_address')) {
      // Used if Drupal (or others) have ip_address method.
      $ip = ip_address();
    }
    elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }

    // Construct the XML message.
    $message = '<?xml version="1.0" encoding="utf-16"?>
            <Device>
            <DateSent>' . gmdate('c') . '</DateSent>' .
            '<Product>51degrees.mobi - Foundation - PHP</Product>
            <Version>2.1.6.11</Version>
            <ClientIP>' . $ip . '</ClientIP>';

    // Add the headers to the information being sent.
    $headers = fiftyone_degrees_GetHeaders();
    foreach ($headers as $servervar => $val) {
      if (strtolower($servervar) == "referer" || strtolower($servervar) == "cookie") {
        $message .= '<Header Name="' . $servervar . '"></Header>';
      }
      else {
        $message .= '<Header Name="' . $servervar . '"><![CDATA[' . $val . ']]></Header>';
      }
    }
    $message .= '</Device>';

    // Send a UDP packet with the xml content.
    @$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    if ($socket) {
      @socket_sendto($socket, $message, strlen($message), 0, $server_ip, $server_port);
    }
  }
}

/**
 * Provides a list of all the available HTTP headers.
 *
 * If the getallheaders function is available this will be used,
 * otherwise all the headers prefixed HTTP_ will be returned.
 *
 * return array
 *  Array of header key value pairs.
 */
function fiftyone_degrees_GetHeaders() {
  if (function_exists('getallheaders')) {
    return getallheaders();
  }
  else {
    foreach ($_SERVER as $name => $value) {
      if (substr($name, 0, 5) == 'HTTP_') {
        $headers[str_replace(' ', '-',
          fiftyone_degrees_UcwordsHyphen(
            strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
      }
    }
    return $headers;
  }
}

/**
 * Makes first character of every word upper case.
 *
 * Uses hyphen seperators to determine first letter of word
 * and change to upper case.
 *
 * $str string
 *  The source string to be manipulated.
 * return string
 *  A modified string.
 */
function fiftyone_degrees_UcwordsHyphen($str) {
  return str_replace('- ', '-', ucwords(str_replace('-', '- ', $str)));
}

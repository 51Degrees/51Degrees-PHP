<?php
/**
 * See LICENSE.TXT for terms of use and copyright.
 */

/**
 * Insert Function Doc comment here.
 */
function fiftyone_degrees_ReducedInitialString($ua_to_test, $max_initial_string, $tolerance) {
  if ((fiftyone_degrees_StartsWith($_SERVER['HTTP_USER_AGENT'], $ua_to_test) || fiftyone_degrees_StartsWith($ua_to_test, $_SERVER['HTTP_USER_AGENT'])) && $max_initial_string < strlen($ua_to_test)) {
    return strlen($ua_to_test);
  }
  return NULL;
}

/**
 * Insert Function Doc comment here.
 */
function fiftyone_degrees_StartsWith($haystack, $needle) {
  $length = strlen($needle);
  return (substr($haystack, 0, $length) === $needle);
}

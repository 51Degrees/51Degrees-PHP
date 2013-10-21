<?php
/**
 * See LICENSE.TXT for terms of use and copyright.
 */
/**
 * See LICENSE.TXT for terms of use and copyright.
 */
/**
 * Todo.
 */
function fiftyone_degrees_finalMatcher(&$user_agent, &$results) {
  $results = fiftyone_degrees_sort_results($results);
  $highest_position = 0;
  $pos = 0;
  $subset = array();
  $ualength = strlen($user_agent);
  foreach ($results as $result) {
    $resultua = $result[4];
    $length = $ualength;
    if($length > strlen($resultua))
      $length = strlen($resultua);

    for($pos = 0; $pos < $length; $pos++) {
      if($user_agent[$pos] != $resultua[$pos])
        break;
    }

    if ($pos > $highest_position) {
      $highest_position = $pos;
      unset($subset);
      $subset = array($result);
    }
    elseif ($pos == $highest_position) {
      $subset[] = $result;
    }
  }

  if (count($subset) == 1) {
    return $subset[0];
  }
  if (count($subset) > 1) {
    return fiftyone_degrees_match_tails($user_agent, $highest_position, $subset);
  }
  return NULL;
}

/**
 * Todo.
 */
function fiftyone_degrees_match_tails(&$useragent, &$pos, &$devices) {
  $longest_subset = 0;
  $tails = array();
  foreach ($devices as $tail) {
    $tail = substr($tail[4], $pos, (strlen($tail[4]) - $pos));
    $tails[] = $tail;
    if (strlen($tail) > $longest_subset) {
      $longest_subset = strlen($tail);
    }
  }
  $amount = 0;
  if (($longest_subset + $pos) < strlen($useragent)) {
    $amount = $longest_subset;
  }
  else {
    $amount = strlen($useragent) - $pos;
  }
  $useragent_tail = substr($useragent, $pos, $amount);
  $closest_tail = NULL;
  $min_distance = PHP_INT_MAX;
  for ($i = 0; $i < count($tails); $i++) {
    $current = $tails[$i];
    $current_distance = fiftyone_degrees_edit_distance($useragent_tail, $current, $min_distance);
    if ($current_distance < $min_distance) {
      $min_distance = $current_distance;
      $closest_tail = $tails[$i];
    }
  }
  $to_return = NULL;
  foreach ($devices as $dev) {
    if (!isset($to_return)) {
      if (fiftyone_degrees_ends_with($dev[4], $closest_tail)) {
        $to_return = $dev;
      }
    }
  }
  if (!is_null($to_return)) {
    return $to_return;
  }
  return $devices[0];
}

/**
 * Todo.
 */
function fiftyone_degrees_ends_with($full_string, $find) {
  $length = strlen($find);
  $start = $length * -1;
  return (substr($full_string, $start) === $find);
}

/**
 * Todo.
 */
function fiftyone_degrees_sort_results($results) {
  $deviceIds = array();
  foreach ($results as $device) {
    $deviceIds[] = $device[5];
  }

  array_multisort($deviceIds, SORT_STRING, $results);
  return $results;
}
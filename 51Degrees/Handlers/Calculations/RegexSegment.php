<?php
/**
 * See LICENSE.TXT for terms of use and copyright.
 */

/**
 * Returns the segment array that match the pattern provided.
 *
 * $pattern string
 *   The regular expression pattern to search for.
 * $useragent string
 *   Input useragent string.
 * return array
 *   Array of matched segments.
 */
function fiftyone_degrees_preg_match_all($pattern, $useragent) {
  preg_match_all($pattern, $useragent, $matches);
  return $matches[0];
}

/**
 * Passed two indexed arrays of two strings and returns a score.
 *
 * Passed two indexed arrays of two strings and returns a score
 * indicating the differences between them. If the score is more
 * than $ls then abandon the operation by returning a very high
 * value.
 *
 * $target array
 *   An array of segments from the target we're searching for.
 * $test array
 *   An array we're going to be testing to see how close it is.
 * $ls integer
 *   The lowest score so far above which we're not interested.
 * $weight integer
 *   The weight of the calculation, higher means more important.
 * $score integer
 *   The current score for the calculation across all segments.
 */
function fiftyone_degrees_calculate_segment_score($target, $test, $ls, $weight, &$score) {
  // If both arrays are empty no need to check anything.
  $count_target = count($target);
  if ($test == NULL && $count_target == 0) {
    return;
  }

  // If the test array is null add an empty string.
  if ($test == NULL) {
    $test = array(0 => '');
  }

  // If the target array is empty, set it to
  // an empty string.
  if ($count_target == 0) {
    $target = array(0 => '');
    $count_target++;
  }

  // If the segment counts aren't equal there's no point
  // comparing the rest of the segments.
  if ($count_target != count($test)) {
    $score = PHP_INT_MAX;
    return;
  }

  // Increment the score for each of the available segments.
  $index = 0;
  while ($index < $count_target) {
    $score += fiftyone_degrees_edit_distance($target[$index], $test[$index], $ls) * $weight;
    // If the score is greater than the lowest one so far
    // give up.
    if ($score > $ls) {
      $score = PHP_INT_MAX;
      return;
    }
    $index++;
  }
}

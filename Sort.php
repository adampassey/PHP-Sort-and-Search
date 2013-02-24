<?php

/**
 *  General Sorting class
 */
class Sort {

/**
 *  Quick sort
 *  http://en.wikipedia.org/wiki/Quicksort
 */
  public static function quickSort($collection) {

    if (count($collection) == 0) return $collection;

    //  first, let's pick a pivot point, last item in list
    $pivot = array_splice($collection, count($collection)-1, 1);

    //  these will hold the values on either
    //  side of the pivot
    $less = $greater = $sorted = array();

    //  loop through the array and sort add them
    //  to less or greater arrays
    foreach ($collection as $k => $v) {
      if ($v < $pivot[0])
        $less[] = $v;
      else
        $greater[] = $v;
    }

    return array_merge(Sort::quickSort($less), $pivot, Sort::quickSort($greater));
  }

  /**
   *  Bubble Sort
   *  http://en.wikipedia.org/wiki/Bubble_sort
   */
  public static function bubbleSort($collection) {

    if (count($collection) == 0) return $collection;

    //  flag for knowing if we have performed a swap
    $swapped = false;

    foreach ($collection as $k => $v) {
      if (isset($collection[$k-1]) && $collection[$k-1] > $v) {
        $tmp = $collection[$k-1];
        $collection[$k-1] = $v;
        $collection[$k] = $tmp;
        $swapped = true;
      }
    }

    if (!$swapped) return $collection;
    return Sort::bubbleSort($collection);

  }

}

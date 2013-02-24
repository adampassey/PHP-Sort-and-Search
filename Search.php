<?php

/**
 *  Search class
 */
class Search {

/**
 *  Binary Search
 *  http://en.wikipedia.org/wiki/Binary_search_algorithm
 */
  public static function binarySearch($term, $collection) {

    if (count($collection) == 0) return false;

    //  Binary search requires a sorted array
    $collection = Sort::quickSort($collection);
    
    //  grab the middle segment of the array
    $pivotKey = intval(count($collection) / 2);

    if ($term == $collection[$pivotKey]) return true;

    if ($term < $collection[$pivotKey]) {
      return Search::binarySearch($term, array_splice($collection, 0, $pivotKey));
    } 
    return Search::binarySearch($term, array_splice($collection, $pivotKey, count($collection)-1));

  }
}

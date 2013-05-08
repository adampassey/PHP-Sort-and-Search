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

  // Used with Merge Sort
  public static function merge($left, $right){
    $result = array();
    while (count($left) > 0 || count($right) > 0){
      if (count($left) > 0 && count($right) > 0){
        if ($left[0] <= $right[0]){
          array_push($result, $left[0]);
          $left = array_slice($left, 1);
        }
        else{
          array_push($result, $right[0]);
          $right = array_slice($right, 1);
        }
      }
      else if (count($left) > 0){
        array_push($result, $left[0]);
        $left = array_slice($left, 1);
      }
      else {
        array_push($result, $right[0]);
        $right = array_slice($right, 1);
      }
    }
  return $result;
}

  /**
   *  Merge Sort
   *  http://en.wikipedia.org/wiki/Merge_sort
   */
  public static function mergeSort($collection){
    if (count($collection) <= 1) return $collection;
  
    $left = $right = array();

    $mid = (int)count($collection)/2;

    foreach ($collection as $k => $v){
      if ($k < $mid)
        array_push($left, $v);
      else
        array_push($right, $v);
      }
    // Recursively sort the right and left sides
    $left = Sort::mergeSort($left);
    $right = Sort::mergeSort($right);
    
    return Sort::merge($left, $right);
  }

  /**
   *  Insertion Sort
   *  http://en.wikipedia.org/wiki/Insertion_sort
   *  http://www.youtube.com/watch?v=ROalU379l3U
   */
  public static function insertionSort($collection){
    foreach ($collection as $k => $v){
      $temp = ($k < count($collection) - 1 ? $collection[$k + 1] : $collection[$k]);
      $j = ($k < count($collection) - 1 ? $k : $k - 1);
      while(isset($collection[$j]) && $collection[$j] > $temp){
        $collection[$j + 1] = $collection[$j];
        $j--;
      }
      $collection[$j + 1] = $temp; 
    }
    return $collection;
  }

}

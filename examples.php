<?php

//  Lazy load used classes
function __autoload($class) {
  include_once($class.'.php');
}

//  use this sample array for sorting and searching
$sampleArray = array(4,2,36,24,9819,654654,98789,1313,4,34,561,91,32,4,64,981,3,5,9,7,98,4,91,5,31);

//  Sorting Examples
Debug::dump(Sort::quickSort($sampleArray));
Debug::dump(Sort::bubbleSort($sampleArray));
Debug::dump(Sort::mergeSort($sampleArray));
Debug::dump(Sort::insertionSort($sampleArray));

//  Search examples
Debug::dump(Search::binarySearch(2, $sampleArray));

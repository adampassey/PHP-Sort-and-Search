<?php

/**
 *  Debug class for easy dumping
 */
class Debug {

  /**
   *  Formatted var_dump
   */
  public static function dump($val) {
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
  }
  
}

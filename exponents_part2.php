<?php 

    // Part II.
    $result = array();
    function exponential($arr, $x) {
      for ($i = 0; $i < count($arr); $i++) {
        $result[] = $arr[$i] ** $x;
      }
      return $result;
    }
    $digits = array(8,11, 4);
    $result = exponential($digits, 4);  
    var_dump($result);
    /* This should dump which contains [4096, 14641,  256]. */
?>
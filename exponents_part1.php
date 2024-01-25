<?php 

    // Part I.

    $digits = array(3, 12, 30);
    function exponential($arr)
    {
      //insert logic here
      $result = array();
      for($i = 0; $i < count($arr); $i++) {
      $result[] = $arr[$i] ** 3;
      }
      return $result;
    }
    $result = exponential($digits);
    var_dump($result); 
    /* expected output:
            array (size=3)
            0 => int 27
            1 => int 1728
            2 => int 27000
    */

?>
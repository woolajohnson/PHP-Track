<?php 
    function get_count($arr) {
        $zeroes = 0;
        $ones = 0;
        $output = array();

        for($i = 0; $i < count($arr); $i++) {
            if($arr[$i]) {
                $ones += 1;
            } else {
                $zeroes += 1;
            }
        }
        $output[] = array(
            "zeroes" => $zeroes,
            "ones" => $ones
        );
        return $output;
    }

    $binary = array( 1, 1, 0, 1, 1, 0, 1); 
    $output = get_count($binary); 
    var_dump($output); 
    //$output should be equal to array("zeroes" => 2,  "ones" => 5);
?>
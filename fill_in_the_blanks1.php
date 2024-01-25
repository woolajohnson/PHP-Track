<?php 
    // Part 1:
    function convert_to_blanks($arr) {
        foreach($arr as $value) {
            echo str_repeat('_ ', $value);
            echo "<br>";
        }
    }

    $list = array(6, 1, 3, 5, 7);
    $arr = convert_to_blanks($list);
    echo $arr;
?>
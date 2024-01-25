<?php 
    // Part 2:
    function convert_to_blanks($arr) {
        foreach($arr as $value) {
            if(is_string($value)) {
                echo $value[0] . " " . str_repeat('_ ', strlen($value) - 1);
                echo "<br>";
            } 
            else if(is_int($value)) {
                echo str_repeat('_ ', $value);
                echo "<br>";
            }
        }
    }
    $list = array(4, "Michael", 3, "Karen", 2, "Rogie");
    $arr = convert_to_blanks($list);
    echo $arr;
?>
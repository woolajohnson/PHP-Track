<?php 
    $numbers = array(13, 143, 88, 65, 120);
    $sum = 0;

    for($i = 0; $i < count($numbers); $i++) {
        $sum += $numbers[$i];
    }

    $mean = $sum / count($numbers);
    echo "Mean of the values: " . $mean;
?>
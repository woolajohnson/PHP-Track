<?php 
    $cards = array(
        "King" => 13,
        "Queen" => 12,
        "Jack" => 11,
        "Ace" => 1,
    );

    function pair($cards) {
       echo "<p>List of keys in the array: </p>";
       echo "<ul>";  
            foreach($cards as $card => $value) {
                echo "<li>{$card}</li>";
            }
       echo "</ul>";
            foreach($cards as $card => $value) {
                echo "<p>The value of {$card} in Pyramid Solitaire is {$value}.</p>";
            }
    }
    pair($cards);
?>
<?php 
    function print_orders($arr) {
        echo "<ol>";
        foreach($arr as $list) {
            echo  "<li>{$list}</li>";
        }
        echo "</ol>";
    }
    $x = array('Spaghetti', 'Pizza', 'Iced tea');
    print_orders($x);
?>

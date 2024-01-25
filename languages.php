<?php 
    $languages = array('PHP', 'JS', 'Ruby');

    // 1.
    echo "<p>for loop</p>";
    echo "<select name='languages' id='languages'>";
            for($i = 0; $i < count($languages); $i++) {
                echo "<option value='{$languages[$i]}'>{$languages[$i]}</option>";
            }
    echo "</select>";

    // 2.
    echo "<p>foreach loop</p>";
    echo "<select name='languages' id='languages'>";
            foreach($languages as $language) {
                echo "<option value='{$language}'>{$language}</option>";
            }
    echo "</select>";

    // 3.
    array_push($languages, "HTML", "CSS");

    // 4.
    echo "<p>New drop-down menu</p>";
    echo "<select name='languages' id='languages'>";
            foreach($languages as $language) {
                echo "<option value='{$language}'>{$language}</option>";
            }
    echo "</select>";
?>

<?php

class HTML_Generator {
    public function render_input($sampleArray) {
        foreach ($sampleArray as $row) {
            echo "<div>";
            foreach ($row as $key => $value) {
                $label = ucfirst($key);
                echo "<label for='{$key}'>{$label}:</label>";
                echo "<input type='text' id='{$key}' name='{$key}' value='{$value}'><br>";
            }
            echo "</div>";
        }
    }

    public function render_list($array, $listType = "unordered") {
        if ($listType === "unordered") {
            echo "<ul>";
            foreach ($array as $item) {
                echo "<li>{$item}</li>";
            }
            echo "</ul>";
        } elseif ($listType === "ordered") {
            echo "<ol>";
            foreach ($array as $item) {
                echo "<li>{$item}</li>";
            }
            echo "</ol>";
        } else {
            echo "Only supported types: 'unordered', 'ordered'";
        }
    }
}

$sampleArray = [
    ["name" => "Bag", "price" => "250", "stocks" => "10"],
    ["name" => "Laptop", "price" => "520", "stocks" => "8"],
    ["name" => "T-shirt", "price" => "140", "stocks" => "16"]
];

$item1 = new HTML_Generator();
$item1->render_input($sampleArray);

$renderList = ["Apple", "Banana", "Cherry"];

$item1->render_list($renderList, "ordered");
$item1->render_list($renderList, "unordered");
?>

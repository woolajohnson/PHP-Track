<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bingo - Revisited</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            main {
                max-width: 42rem;
                margin: 5rem auto;
                text-align: center;
                font-size: 0px;
            }
            div {
                text-align: center;
                padding: 0.5em 0.6em;
                width: 8rem;
                height: 8rem;
                line-height: 8rem;
                display: inline-block;
            }
            h1 {
                border: 1px solid black;
                width: 100%;
                height: 100%;
                font-size: 2.5rem;
            }
            h3 {
                font-size: 2rem;
                display: inline-block;
                width: 100%;
                height: 100%;
                border: 1px solid black;
            }
            .odd {
                color: blue;
            }
            .even {
                color: red;
            }
        </style>
    </head>
    <body>
        <main>  
<?php 
            $headers = array("B", "I", "N", "G", "O");
        foreach($headers as $header) {
?>    
            <div>
                <h1><?= $header ?></h1> 
            </div>
<?php
        }
        for($i = 2; $i < 6; $i++) {
            for($j = 1; $j < 6; $j++) {
                if($i % 2 == 0) {
                    $rowColor = $j % 2 == 0 ? 'class="even"' : 'class="odd"';
                } else {
                    $rowColor = $j % 2 == 0 ? 'class="odd"' : 'class="even"';
                }
?>
            <div <?= $rowColor ?> >
                <h3><?= ($i * $j) ?></h3>
            </div>
<?php
            }
        }
?>    
        </main>
    </body>
</html>
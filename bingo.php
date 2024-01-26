<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bingo</title>
        <style>
            main {
                width: 40rem;
                margin: 5rem auto;
            }
            table, th, td {
                border: 2px solid black;
                border-collapse: collapse;
                text-align: center;
                margin: 0 auto;
                padding: 0.5em 0.8em;
            }
            th {
                font-size: 2.5rem;
            }
            td {
                font-size: 2rem;
            }
            .odds {
                color: blue;
            }
            .evens {
                color: red;
            }
        </style>
    </head>
    <body>
        <main>
            <table>
                <thead>
                    <tr>
<?php 
                        $headers = array("B", "I", "N", "G", "O");
                        foreach($headers as $header) {
?>    
                            <th><?= $header ?></th>
<?php
                        }
?>
                    </tr>
                </thead>
                <tbody>
<?php 
                    for($i = 2; $i < 6; $i++) {  
                        $rowColor = $i % 2 == 0 ? 'class="odds"' : 'class="evens"';
?>
                    <tr <?= $rowColor ?> >  
<?php
                        for($j = 1; $j < 6; $j++) {
?>
                        <td><?= ($i * $j) ?></td>
<?php
                        }
                    }
?>
                    </tr>
                </tbody>
            </table>
        </main>
    </body>
</html>
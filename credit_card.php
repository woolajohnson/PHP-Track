<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Credit Card</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                }
                th {
                    background-color: #000;
                    color: #fff;
                }
            }
            .highlight {
                background-color: grey;
            }
        </style>
    </head>
    <body>
<?php

        $users = array( 
            array('cardholder_name' => "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
            array('cardholder_name' => "John Supsupin", 'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
            array('cardholder_name' => "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
            array('cardholder_name' => "Mark Guillen", 'cvc' => 345, 'acc_num' => '123 123 123 123'),
            array('cardholder_name' => "Stephen Curry", 'cvc' => 456, 'acc_num' => '9876 5432 1234 5678'),
            array('cardholder_name' => "LeBron James", 'cvc' => 321, 'acc_num' => '8765 4321 5678 1234'),
            array('cardholder_name' => "Kevin Durant", 'cvc' => 654, 'acc_num' => '2345 67 5678 1234'),
            array('cardholder_name' => "Michael Jordan", 'cvc' => 789, 'acc_num' => '3456 7890 1234 5678'),
            array('cardholder_name' => "Kyrie Irving", 'cvc' => 234, 'acc_num' => '6789 0123 5678 9012'),
            );

        function shouldHighlight($index) {
            return ($index + 1) % 3 == 0;
        }

        function isValid($fullAccount) {
            if(strlen(str_replace(' ', '', $fullAccount)) == 19) {
                return "yes";
            } else {
                return "no";
            }
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Name in uppercase</th>
                    <th>Account Num</th>
                    <th>CVC Num</th>
                    <th>Full account</th>
                    <th>Length of full account</th>
                    <th>Is valid</th>
                </tr>
            </thead>
            <tbody>
<?php
                for ($i = 0; $i < count($users); $i++) {
                    $id = $i + 1;
                    $name = $users[$i]['cardholder_name'];
                    $nameToUpperCase = strtoupper($name);
                    $accountNum = $users[$i]['acc_num'];
                    $cvcNum = $users[$i]['cvc'];
                    $fullAccount = $accountNum . $cvcNum;
                    $lengthOfFullAccount = strlen(str_replace(' ', '', $fullAccount));
                    $isValid = isValid($fullAccount);
            
                    $highlight = shouldHighlight($i) ? ' class="highlight"' : '';
?>
                <tr <?=$highlight?> >
                    <td><?= $id ?></td>
                    <td><?= $name ?></td>
                    <td><?= $nameToUpperCase ?></td>
                    <td><?= $accountNum ?></td>
                    <td><?= $cvcNum ?></td>
                    <td><?= $fullAccount ?></td>
                    <td><?= $lengthOfFullAccount ?></td>
                    <td><?= $isValid ?></td>
<?php           } ?>
                </tr>
            </tbody>
        </table>
    </body>
</html>
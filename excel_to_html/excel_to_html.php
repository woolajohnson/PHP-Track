<?php
ini_set('auto_detect_line_endings', true);

$csvFile = fopen('us-500.csv', 'r');

$rowCount = 0;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Excel to Html</title>
        <style>
            table {
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company Name</th>
                <th>Full Address</th>
                <th>Phone 1</th>
                <th>Phone 2</th>
                <th>Email Address</th>
                <th>Website</th>
            </tr>
<?php
            $header = fgetcsv($csvFile);
            $requiredColumns = [
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'company_name' => 'Company Name',
                'address' => 'Full Address',
                'phone1' => 'Phone 1',
                'phone2' => 'Phone 2',
                'email' => 'Email Address',
                'web' => 'Website',
            ];
            $columnIndexes = [];
            foreach ($requiredColumns as $columnName => $columnLabel) {
                $index = array_search($columnName, $header);
                if ($index !== false) {
                    $columnIndexes[$columnName] = $index;
                } else {
                    die("Column '$columnLabel' not found in the CSV file.");
                }
            }
            while (($data = fgetcsv($csvFile)) !== false) {
                $rowCount++;

                $tenthRow = ($rowCount % 10 === 0);
                $highlight = $tenthRow ? 'background-color: #e1e1e1;' : '';
?>
            <tr style="<?= $highlight ?>">
                <td><?= $data[$columnIndexes['first_name']] ?></td>
                <td><?= $data[$columnIndexes['last_name']] ?></td>
                <td><?= $data[$columnIndexes['company_name']] ?></td>
                <td><?= $data[$columnIndexes['address']] ?></td>
                <td><?= $data[$columnIndexes['phone1']] ?></td>
                <td><?= $data[$columnIndexes['phone2']] ?></td>
                <td><?= $data[$columnIndexes['email']] ?></td>
                <td><?= $data[$columnIndexes['web']] ?></td>
            </tr>
<?php       }
?>
        </table>
<?php
        fclose($csvFile);
?>
    </body>
</html>


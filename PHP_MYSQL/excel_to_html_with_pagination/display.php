<?php 
    require_once('new-connection.php');
    ini_set('auto_detect_line_endings', true);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Excel to Html with Pagination</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css/" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <article>
<?php
            if (isset($_GET['id'])) {
                $file_id = $_GET['id'];
                $result = fetch_record("SELECT `filename` FROM `uploaded_files` WHERE `id` = $file_id");

                if (count($result) > 0) {
                    $filename = $result['filename']; ?>
            <a href="index.php">Get back</a>
            <h2><?= $filename ?></h2>
<?php
            $rows_per_page = 50;
            if (isset($_GET['page'])) {
                $page = max(1, $_GET['page']);
            } else {
                $page = 1;
            }                
            $offset = ($page - 1) * $rows_per_page;

            // Read CSV file
            $csv_path = "uploads/$filename";
            $csv_file = fopen($csv_path, "r");

            if ($csv_file) { ?>
            <table border='1'>
                <!-- Display header row -->
                <tr>
<?php           foreach (fgetcsv($csv_file) as $column): ?>
                    <th><?= $column ?></th>
<?php           endforeach; ?>
                </tr>
                <!-- Display data rows with pagination -->
<?php
        $row_counter = 0;
        while (($data = fgetcsv($csv_file)) !== false) {
            if ($row_counter >= $offset && $row_counter < ($offset + $rows_per_page)) { ?>
                <tr>
<?php        foreach ($data as $value): ?>
                    <td><?= $value ?></td>
<?php        endforeach; ?>
                </tr>
<?php
            }
            $row_counter++;
        } ?>
            </table>
                        <!-- Pagination links -->
            <p class="pagination">
<?php               for ($i = 1; $i <= ceil($row_counter / $rows_per_page); $i++): ?>
                <a href='display.php?id=<?= $file_id ?>&page=<?= $i ?>'><?= $i ?></a>
<?php               endfor; ?>
            </p>
<?php               fclose($csv_file); 
                    } else { ?>
                        <h3>Failed to open CSV file.</h3>
<?php
                    } 
                } else { ?>
                    <h3>Invalid file ID.</h3>
<?php
                }
            } else { ?>
                <h3>Invalid request.</h3>
<?php
            } ?>
        </article>
    </body>
</html>

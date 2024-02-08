<?php 
    require_once('new-connection.php');
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
        <main>
            <form action="process.php" method="post" enctype="multipart/form-data">
                <input type="file" name="csv_file" accept=".csv" required>
                <button type="submit" name="upload">Upload</button>
            </form>
            <h2>Uploaded Files</h2>
            <ol>
<?php
            $query = "SELECT * FROM uploaded_files";
            $results = fetch_all($query);
            if(count($results) > 0) {
                foreach($results as $result) { ?>
                <li><a href="display.php?id=<?= $result['id'] ?>"><?= $result['filename']?></a></li>
<?php           } ?>
            </ol>
<?php       } else { ?>
                <p>No files uploaded yet.</p>
<?php       } ?>
        </main>
    </body>
</html>
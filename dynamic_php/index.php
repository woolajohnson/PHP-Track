<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dynamic PHP</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="main.js.php"></script>
        <link rel="stylesheet" href="main.css.php" />
        <style>
            main {
                max-width: 80vw;
                margin: 1rem auto;
                text-align: center;
                div {
                    margin-top: 2rem;
                }
            }
        </style>
    </head>
    <body>
        <main>
            <p>This text changes its size every reload.</p>
            <em>Thanks to PHP that generated a CSS File!</em>
            <div>
                <?php include 'ticket.php'; ?>
            </div>
        </main>
    </body>
</html>

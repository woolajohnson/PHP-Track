<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Spiderbot</title>
        <style>
            main {
                max-width: 80vw;
                margin: 2rem auto;
                p {
                    color: #FF5F1F;
                    font-size: 1.4rem;
                }
                a {
                    font-size: 1.3rem;
                    margin-left: 2rem;
                }
            }
        </style>
    </head>
    <body>
        <main>
            <h1>Top 5 Results</h1>
<?php
        require("simple_html_dom.php");
        $html = file_get_html('https://www.bing.com/search?q=software+engineer&form=QBLH&sp=-1&ghc=1&lq=0&pq=software+engineer&sc=11-17&qs=n&sk=&cvid=A5C3662E0A7A4FC6B6522363CE80E014&ghsh=0&ghacc=0&ghpl=');

        $result = $html->find('.b_algo h2 a');
        for($i = 0; $i < 5; $i++) {
            $title = ($i + 1) . ".)" . " " . $result[$i]->plaintext;
            $link = $result[$i]->href;            
?>
            <p><?= $title ?></p>
            <a href="<?= $link ?>"><?= $link ?></a>
<?php
        }
?>
        </main>
    </body>
</html>
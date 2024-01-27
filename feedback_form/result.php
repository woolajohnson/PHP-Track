<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        main {
            max-width: 40rem;
            margin: 4rem auto;
            border: 1px solid #000;
            padding: 1em 6em 3em 4em;
            border-radius: 1em;
            h1 {
                margin-bottom: 2rem;
                font-size: 2.3rem;
            }
            h1, p, a {
                margin-left: 8rem;
                padding: 0.3em 0;
                word-wrap: break-word;
            }
            p, a {
                font-size: 1.2rem;
            }
            #reason {
                margin-bottom: 3rem;
            }
            a {
                padding: 0.7em 1.3em;
                cursor: pointer;
                background-color: blue;
                color: #fff;
                border: none;
                outline: none;
                border-radius: 0.2em;
                text-decoration: none;
                margin-top: 5rem;
            }
        }
    </style>
</head>
<body>
<?php 
    $name = $_POST['name'];
    $course_title = $_POST['course_title'];
    $score = $_POST['score'];
    $reason = $_POST['reason'];
?>
    <main>
        <h1>Submitted Entry</h1>
        <p>Your Name (optional): <?= $name ?></p>
        <p>Course Title: <?= $course_title ?></p>
        <p>Given Score (1-10): <?= $score ?></p>
        <p id="reason">Reason: <?= $reason ?></p>
        <a href="index.php">Return</a>
    </main>
</body>
</html>
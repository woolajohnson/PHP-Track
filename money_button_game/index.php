<?php 
    session_start();
    if(!isset($_SESSION['money'])) {
        $_SESSION['money'] = 500;
    }
    if(!isset($_SESSION['message'])) {
        $_SESSION['message'] = "";
    }
    if(!isset($_SESSION['color'])) {
        $_SESSION['color'] = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Money Button Game</title>
        <style>
            .win_color {
                color: green;
            }
            .lose_color {
                color: red;
            }
        </style>
    </head>
    <body>
        <main>
            <header>
                <h2>Your money: <span><?= $_SESSION['money'] ?></span></h2>
                <form action="process.php" method="POST">
                    <input type="submit" name="reset" value="Reset Game">
                </form>
            </header>
            <section>
                <form action="process.php" method="POST">
                    <h3>Low Risk</h3>
                    <input type='hidden' name='low_risk' value='low_risk'>
                    <input type="submit" value="Bet">
                    <p>by -25 up to 100</p>
                </form>
                <form action="process.php" method="POST">
                    <h3>Moderate Risk</h3>
                    <input type='hidden' name='moderate_risk' value='moderate_risk'>
                    <input type="submit" value="Bet">
                    <p>by -100 up to 1000</p>
                </form>
                <form action="process.php" method="POST">
                    <h3>High Risk</h3>
                    <input type='hidden' name='high_risk' value='high_risk'>
                    <input type="submit" value="Bet">
                    <p>by -500 up to 2500</p>
                </form>
                <form action="process.php" method="POST">
                    <h3>Severe Risk</h3>
                    <input type='hidden' name='severe_risk' value='severe_risk'>
                    <input type="submit" value="Bet">
                    <p>by -3000 up to 5000</p>
                </form>
            </section>
            <div class="host_game">
                <?= $_SESSION['message']; ?>
            </div>
        </main>
    </body>
</html>

<?php 

    for($i = 1; $i <= 50; $i++) {
        $score = rand(1, 100);
        $below_50 = "Never sing again, ever!";
        $bet_5079 = "Practice more!";
        $bet_8094 = "You're getting better!";
        $bet_95100 = "What an excellent singer!";

        if($score < 50) {
            echo "<h1>{$score}</h1> <br>";
            echo "<h2>{$below_50}</h2> <br><hr>";
        } else if($score > 49 && $score < 80) {
            echo "<h1>{$score}</h1> <br>";
            echo "<h2>{$bet_5079}</h2> <br><hr>";
        } else if($score > 79 && $score < 95) {
            echo "<h1>{$score}</h1> <br>";
            echo "<h2>{$bet_8094}</h2> <br><hr>";
        } else {
            echo "<h1>{$score}</h1> <br>";
            echo "<h2>{$bet_95100}</h2> <br><hr>";
        }
    }
?>
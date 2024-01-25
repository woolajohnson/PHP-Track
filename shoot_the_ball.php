<?php 
    $success = 0;
    $fail = 0;

    echo "<p>Practice starts...</p>";
    for($i = 1; $i <= 1000; $i++) {
        $shoot = rand(0, 1);
        if($shoot == true) {
            $success += 1;
           echo "Attempt #{$i}: Shooting the ball... Success! ... Got {$success}x success and {$fail}x epic fail(s) so far <br>"; 
        } else {
            $fail += 1;
           echo "Attempt #{$i}: Shooting the ball... Epic Fail! ... Got {$success}x success and {$fail}x epic fail(s) so far <br>"; 
        }
    }
    echo "<p>Practice ended.</p>";
?>

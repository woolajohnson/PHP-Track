<?php
 header('Content-type: text/javascript');
?>
$(document).ready(function(){
    var message = Math.floor(Math.random() * 100) + 100;
    var alertMessage = Math.random() < 0.5;

    if (alertMessage) {
        alert('You are ' + message + 'x better than before!');
    } else {
        console.log('You are ' + message + 'x better than before!');
    }
});
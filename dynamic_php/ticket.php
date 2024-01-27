<?php
function createTicketImage($ticketNumber) {
    $image = imagecreatetruecolor(200, 100);
    $bgColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagefill($image, 0, 0, $bgColor);

    $textColor = imagecolorallocate($image, 255, 255, 255); // Use white text color
    imagestring($image, 5, 50, 40, 'Ticket #' . $ticketNumber, $textColor);

    $filename = 'ticket_' . $ticketNumber . '.png';
    imagepng($image, $filename);
    imagedestroy($image);

    return $filename;
}

for ($i = 1; $i <= 5; $i++) {
    $ticketNumber = rand(1000, 9999);
    $filename = createTicketImage($ticketNumber);
    echo '<img src="' . $filename . '" alt="Ticket ' . $ticketNumber . '"><br>';
}
?>

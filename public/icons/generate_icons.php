<?php
$dir = __DIR__;
$sizes = [192, 512];

foreach ($sizes as $size) {
    $img = imagecreatetruecolor($size, $size);
    $bg = imagecolorallocate($img, 79, 70, 229); // #4f46e5 Indigo
    $white = imagecolorallocate($img, 255, 255, 255);
    imagefill($img, 0, 0, $bg);
    
    // Draw rounded rect or circle background if desired, or simple fill
    // Draw "AH" text or logo
    $fontSize = (int)($size * 0.3);
    // Draw text using imagestring
    $text = "AH";
    // Center approximate offset
    $charWidth = imagefontwidth(5) * (strlen($text));
    $charHeight = imagefontheight(5);
    
    // Create high quality scaled text or simple text
    $x = ($size - ($charWidth * ($size/50))) / 2;
    $y = ($size - ($charHeight * ($size/50))) / 2;
    
    // Use TTF if possible or basic drawing
    // Draw custom AH logo shape
    $padding = (int)($size * 0.2);
    $w = $size - (2 * $padding);
    $h = $size - (2 * $padding);
    
    // Inner box
    $rectColor = imagecolorallocate($img, 99, 102, 241);
    imagefilledrectangle($img, $padding, $padding, $size - $padding, $size - $padding, $rectColor);
    
    // Draw text
    imagestring($img, 5, (int)($size/2 - 10), (int)($size/2 - 8), "AH", $white);
    
    imagepng($img, $dir . '/icon-' . $size . 'x' . $size . '.png');
    imagedestroy($img);
}

echo "Icons generated successfully!";

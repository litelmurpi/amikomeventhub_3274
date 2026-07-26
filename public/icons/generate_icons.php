<?php

$dir = __DIR__;
$sizes = [192, 512];

foreach ($sizes as $size) {
    $img = imagecreatetruecolor($size, $size);
    imagesavealpha($img, true);
    $transparent = imagecolorallocatealpha($img, 0, 0, 0, 127);
    imagefill($img, 0, 0, $transparent);

    $bg = imagecolorallocate($img, 15, 23, 42); // #0f172a
    $indigo = imagecolorallocate($img, 99, 102, 241); // #6366f1
    $emerald = imagecolorallocate($img, 16, 185, 129); // #10b981
    $white = imagecolorallocate($img, 255, 255, 255);

    // Draw main background rounded box
    $margin = (int)($size * 0.05);
    $radius = (int)($size * 0.2);

    imagefilledrectangle($img, $margin, $margin + $radius, $size - $margin, $size - $margin - $radius, $bg);
    imagefilledrectangle($img, $margin + $radius, $margin, $size - $margin - $radius, $size - $margin, $bg);
    
    imagefilledellipse($img, $margin + $radius, $margin + $radius, 2 * $radius, 2 * $radius, $bg);
    imagefilledellipse($img, $size - $margin - $radius, $margin + $radius, 2 * $radius, 2 * $radius, $bg);
    imagefilledellipse($img, $margin + $radius, $size - $margin - $radius, 2 * $radius, 2 * $radius, $bg);
    imagefilledellipse($img, $size - $margin - $radius, $size - $margin - $radius, 2 * $radius, 2 * $radius, $bg);

    // Draw central Indigo Arch & Stems
    $centerX = (int)($size / 2);
    $centerY = (int)($size / 2);

    // Arch
    imagefilledellipse($img, $centerX, (int)($size * 0.38), (int)($size * 0.5), (int)($size * 0.5), $indigo);
    imagefilledellipse($img, $centerX, (int)($size * 0.38), (int)($size * 0.35), (int)($size * 0.35), $bg);

    // Vertical Stems
    imagefilledrectangle($img, (int)($size * 0.28), (int)($size * 0.38), (int)($size * 0.38), (int)($size * 0.72), $indigo);
    imagefilledrectangle($img, (int)($size * 0.62), (int)($size * 0.38), (int)($size * 0.72), (int)($size * 0.72), $indigo);

    // Emerald Soundwave Equalizer Bars
    imagefilledrectangle($img, (int)($size * 0.44), (int)($size * 0.48), (int)($size * 0.47), (int)($size * 0.62), $emerald);
    imagefilledrectangle($img, (int)($size * 0.485), (int)($size * 0.42), (int)($size * 0.515), (int)($size * 0.68), $emerald);
    imagefilledrectangle($img, (int)($size * 0.53), (int)($size * 0.48), (int)($size * 0.56), (int)($size * 0.62), $emerald);

    imagepng($img, $dir . '/icon-' . $size . 'x' . $size . '.png');
    imagedestroy($img);
}

echo "PWA Icons generated successfully with Gemini-SVG logo design!\n";

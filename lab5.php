<?php
    header('Content-Type: image/png');
    $img = imagecreatetruecolor(1000,1000);
    $white = imagecolorallocate($img,255,255,255);
    $black = imagecolorallocate($img,0,0,0);
    $green = imagecolorallocate($img,0,255,0);
    $blue =  imagecolorallocate($img,0,0,255);
    $yellow = imagecolorallocate($img,255,255,0);
    $grey = imagecolorallocate($img,128,128,128);
    imagefilledrectangle($img,0,0,1000,1000,$white);
    imagefilledarc($img,500,1000,1000,400,-180,0,$green,0);
    imagefilledarc($img,800,200,200,170,0,360,$yellow,0);
    imagefilledrectangle($img,200,400,800,900,$grey);
    imagerectangle($img,200,400,800,900,$black);
    imagefilledpolygon($img,array(200,400,400,200,800,400),3,$grey);
    imagepolygon($img,array(200,400,400,200,800,400),3,$black);
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            imagefilledrectangle($img,300 + $i * 150, 450 + $j * 150, 400 + $i * 150, 550 + $j * 150, $blue);
        }
    }
    imagejpeg($img,NULL,100);
?>
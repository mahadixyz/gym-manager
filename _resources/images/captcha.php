<?php
    session_start();
    $string = md5(rand());
    $captchaCode = substr($string, 0, 6);
    $_SESSION["captchaCode"] = $captchaCode;

    $Layer = imagecreatetruecolor(150,50);
    $bg = imagecolorallocate($Layer, 214, 214, 214);
    imagefill($Layer,0,0,$bg);
    $fontColor = imagecolorallocate($Layer, 53, 12, 99);
    imagestring($Layer, 5, 50, 20, $captchaCode, $fontColor);
    header("Content-type: image/png");
    imagepng($Layer);
    imagedestroy($Layer); 
?>
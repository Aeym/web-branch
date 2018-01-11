<?php
$str = file_get_contents("https://www.google.fr/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png");
echo base64_encode($str);
?>

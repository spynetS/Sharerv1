<?php
$filename = $_POST['file'];
$file = fopen($filename, "rb");
$contents = fread($file, filesize($filename));
fclose($file);
echo $contents;
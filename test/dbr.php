<?php 


$data = $_REQUEST["q"];

$fp = fopen('dbr.txt', 'w');
fwrite($fp, $data);
fclose($fp);


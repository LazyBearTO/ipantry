<?php
include_once '../db/conn.php';
include_once '../db/dao.php';


$scanned_txt = "3564700652657";
$scanned_item = lookup_remote_db($scanned_txt);
print_r($scanned_item);
exit();

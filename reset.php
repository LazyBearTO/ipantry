<?php
include_once 'db/conn.php';

//import ipantry.sql
$filename = 'db/ipantry.sql';

// Read in entire file
$lines = file($filename);

$sql = file_get_contents($filename);

$sql = "TRUNCATE scanned_item";

if ($connect->multi_query($sql)) {
    echo "success";
} else {
    echo "error";
}

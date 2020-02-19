<?php
include_once 'db/conn.php';
include_once 'db/dao.php';


if ($_POST["scanned_txt"]) {
     $scanned_txt = mysqli_real_escape_string($connect, $_POST["scanned_txt"]);
} else {
     $scanned_txt = mysqli_real_escape_string($connect, $_REQUEST["q"]);
}


//serach remote database

// print_r($scanned_item);
// var_dump($scanned_item);
// exit();

//if found online, get info from online
if ($_POST["action"]) {
     $scanned_txt = mysqli_real_escape_string($connect, $_POST["scanned_txt"]);
     stock_item_into_db($scanned_txt);
} else {
     scan_item_into_db($scanned_txt);
}

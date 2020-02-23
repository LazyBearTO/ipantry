<?php
include_once 'db/conn.php';
include_once 'db/dao.php';


if ($_POST["scanned_txt"]) {
     $scanned_txt = mysqli_real_escape_string($connect, $_POST["scanned_txt"]);
} else {
     $scanned_txt = mysqli_real_escape_string($connect, $_REQUEST["q"]);
}


//if found online, get info from online
if ($_POST["action"] == "stock") {
     $scanned_txt = mysqli_real_escape_string($connect, $_POST["scanned_txt"]);
     stock_item_into_db($scanned_txt);
} else {
     scan_item_into_db($scanned_txt);
}

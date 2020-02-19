<?php
include_once 'db/conn.php';
include_once 'db/dao.php';

$scanned_txt = mysqli_real_escape_string($connect, $_POST["scanned_txt"]);

//serach remote database
$scanned_item = lookup_remote_db($scanned_txt);
// print_r($scanned_item);
// var_dump($scanned_item);
// exit();

if ($scanned_item) {

     $product_name = mysqli_real_escape_string($connect, $scanned_item['product_name']);
     $brand_name = mysqli_real_escape_string($connect, $scanned_item['brand_name']);
     $image_thumb_url = mysqli_real_escape_string($connect, $scanned_item['image_thumb_url']);
     $sql = "INSERT INTO scanned_item(scanned_txt, product_name, brand_name, image_thumb_url) 
        VALUES('" . $scanned_txt . "',
               '" . $product_name . "',
               '" . $brand_name . "',
               '" . $image_thumb_url . "'
               )";
} else {
     $sql = "INSERT INTO scanned_item(scanned_txt) 
        VALUES('" . $scanned_txt . "')";
}
// echo $sql;
// exit();
if (mysqli_query($connect, $sql)) {
     echo $sql;
}

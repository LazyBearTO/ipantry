<?php
include_once 'db/conn.php';

$id  = $_POST["id"];
// $sql = "SELECT * FROM scanned_item WHERE id = " . $id;

// if ($result = mysqli_query($connect, $sql)) {
//     echo $sql . "\n";
// }
// //exit();
// $row = $result->fetch_assoc();
// $scanned_id = mysqli_real_escape_string($connect, $row["id"]);
// $scanned_datetime = mysqli_real_escape_string($connect, $row["scanned_datetime"]);
// $scanned_txt = mysqli_real_escape_string($connect, $row["scanned_txt"]);
// $product_name = mysqli_real_escape_string($connect, $row["product_name"]);
// $brand_name = mysqli_real_escape_string($connect, $row["brand_name"]);
// $image_thumb_url = mysqli_real_escape_string($connect, $row["image_thumb_url"]);
//var_dump($row);
//exit();

//insert inventory
// $sql = "INSERT INTO inventory_item(scanned_id, scanned_datetime, scanned_txt, product_name, brand_name, image_thumb_url, stock_datetime) 
//         VALUES('" . $scanned_id . "',
//                 '" . $scanned_datetime . "',
//                 '" . $scanned_txt . "',
//                 '" . $product_name . "',
//                 '" . $brand_name . "',
//                 '" . $image_thumb_url . "',
//                 now()
//                 )";
// echo $sql;
// exit();
// if (mysqli_query($connect, $sql)) {
//     echo $sql . "\n";
// }
// //update scanned_item
$sql = "UPDATE scanned_item SET stock_datetime = NOW() WHERE (id=$id)";
if (mysqli_query($connect, $sql)) {
    echo $sql . "\n";
}
// echo $sql . "\n";
// exit();

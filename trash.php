<?php
include_once 'db/conn.php';
include_once 'db/dao.php';

if ($_POST["scanned_txt"])
    $scanned_txt = $_POST["scanned_txt"];

trash_item_into_db($scanned_txt);


//$sql = "DELETE FROM scanned_item WHERE id = '".$_POST["id"]."'";

// $sql = "UPDATE scanned_item SET trash_datetime = NOW() WHERE (id=$id)";

// if (mysqli_query($connect, $sql)) {
//       echo $sql . "\n";
// }

// $sql = "UPDATE inventory_item SET trash_datetime = NOW() WHERE (scanned_id=$id)";
// echo $sql . "\n";
// if (mysqli_query($connect, $sql)) {
//       echo $sql . "\n";
// }

//  $sql = "DELETE FROM inventory_item WHERE scanned_id = '".$_POST["id"]."'";

//  if(mysqli_query($connect, $sql))  
//  {  
//       echo $sql."\n";  
//  }  

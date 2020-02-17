<?php
include_once 'db/conn.php';

$id = $_POST["id"];

//$sql = "DELETE FROM scanned_item WHERE id = '".$_POST["id"]."'";

$sql = "UPDATE scanned_item SET trash_datetime = NOW() WHERE (id=$id)";

if (mysqli_query($connect, $sql)) {
      echo $sql . "\n";
}

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

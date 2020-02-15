<?php  
 include_once 'conn.php';

 $id = $_POST["id"]; 
 $text = mysqli_real_escape_string($connect, $_POST["text"]);  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE scanned_item SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>
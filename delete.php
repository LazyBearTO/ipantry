<?php  
 include_once 'conn.php';

 $sql = "DELETE FROM scanned_item WHERE id = '".$_POST["id"]."'";

 if(mysqli_query($connect, $sql))  
 {  
      //echo 'Data Deleted';  
 }  
 ?>
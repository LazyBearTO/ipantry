<?php  
 include_once 'conn.php';
 
 $scanned_txt = mysqli_real_escape_string($connect, $_POST["scanned_txt"]);
 $product_name = mysqli_real_escape_string($connect, $_POST["product_name"]);
 $brand_name = mysqli_real_escape_string($connect, $_POST["brand_name"]);
 $image_thumb_url = mysqli_real_escape_string($connect, $_POST["image_thumb_url"]);


 $sql = "INSERT INTO scanned_item(scanned_txt, product_name, brand_name, image_thumb_url) 
        VALUES('".$scanned_txt."',
               '".$product_name."',
               '".$brand_name."',
               '".$image_thumb_url."'
               )";  
 
 
 if(mysqli_query($connect, $sql))  
 {  
      //echo 'Data Inserted';  
 }  
 ?> 
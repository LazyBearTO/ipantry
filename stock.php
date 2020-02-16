<?php  
 include_once 'conn.php';

 $id  = $_POST["id"];
 $sql = "SELECT * FROM scanned_item WHERE id = ".$id;
 $result = mysqli_query($connect, $sql);
 //echo $sql;
 //exit();
 $row = $result->fetch_assoc();
 $scanned_txt = mysqli_real_escape_string($connect,$row["scanned_txt"]);
 $product_name = mysqli_real_escape_string($connect,$row["product_name"]);
 $brand_name = mysqli_real_escape_string($connect,$row["brand_name"]); 
 $image_thumb_url = mysqli_real_escape_string($connect,$row["image_thumb_url"]);       
 //var_dump($row);
 //exit();
 $sql = "INSERT INTO inventory_item(scanned_id, scanned_txt, product_name, brand_name, image_thumb_url, stock_datetime) 
        VALUES('".$id."',
                '".$scanned_txt."',
                '".$product_name."',
                '".$brand_name."',
                '".$image_thumb_url."',
                now()
                )"; 
 //echo $sql;
 //exit();
 if(mysqli_query($connect, $sql))  
    {  
        echo $sql."\n"; 
    }  

 //update table scanned_item
 $sql = "UPDATE scanned_item
        SET stock_datetime = NOW()
        WHERE (id=$id)"; 
 if(mysqli_query($connect, $sql))  
    {  
        echo $sql."\n"; 
    }  

?>
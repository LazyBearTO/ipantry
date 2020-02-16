<?php  
 include_once 'conn.php';

 $id  = $_POST["id"];
 $sql = "SELECT * FROM scanned_item WHERE id = ".$id;
 $result = mysqli_query($connect, $sql);
 //echo $sql;
 //exit();
 $row = $result->fetch_assoc();
 $scanned_txt = $row["scanned_txt"];
 $product_name = $row["product_name"];
 $brand_name = $row["brand_name"]; 
 $image_thumb_url = $row["image_thumb_url"];       
 //var_dump($row);
 //exit();
 //find barcode in inventory
 $sql = "SELECT * FROM inventory WHERE scanned_txt = '".$scanned_txt."'";
 //echo $sql;
 //exit();
 if($result = mysqli_query($connect, $sql))  
 {  
    // if exits
    if ($result->num_rows > 0) {
        // output data of each row
        $count = 0;
        while($row = $result->fetch_assoc()) {
            //echo "Count: " . $row["item_count"];
            $inventory_id = $row["id"];
            $item_count = $row["item_count"] + 1;      
        }
        $sql = "UPDATE inventory
                SET item_count = $item_count, 
                product_name = '".$product_name."', 
                brand_name = '".$brand_name."', 
                image_thumb_url = '".$image_thumb_url."', 
                item_count = $item_count,
                moved_time = now()
                WHERE (id=$inventory_id)"; 
        if(mysqli_query($connect, $sql))  
            {  
                echo $sql;  
            }  
    } else {
    $sql = "INSERT INTO inventory(scanned_txt, product_name, brand_name, image_thumb_url, item_count, moved_time) 
            VALUES('".$scanned_txt."',
                  '".$product_name."',
                  '".$brand_name."',
                  '".$image_thumb_url."',
                  '1',
                  now()
                  )"; 
    //echo $sql;
        if(mysqli_query($connect, $sql))  
            {  
                echo $sql;  
            }  
    }

    //remove from scanned_item
    $sql = "UPDATE scanned_item
            SET moved_time = NOW()
            WHERE (id=$id)"; 
    if(mysqli_query($connect, $sql))  
        {  
            echo $sql;  
        }  


 }  


//  //if(mysqli_query($connect, $sql))  
//  {  
//       echo $sql;  
//  }  
//  ?>
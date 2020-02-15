<?php  
 include_once 'conn.php';
 
 $output = ''; 
 $sql = "SELECT * FROM inventory ORDER BY item_count DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
    <div class="table-responsive">  
        <table class="table table-bordered table-striped">  
            <tr>  
                    <th width="4%">count</th>  
                    <th width="10%">image</th>
                    <th >barcode</th>  
                    <th >product name</th>
                    <th >brand</th> 
                
                    <th width="15%">scanned_datetime</th>
            </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
   
     while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td class="item_count" data-id6="'.$row["item_count"].'" >'.$row["item_count"].'</td> 
                     <td class="image_thumb_url" data-id4="'.$row["id"].'" ><img src='.$row["image_thumb_url"].'></img></td>     
                     <td class="scanned_txt" data-id1="'.$row["id"].'" >'.$row["scanned_txt"].'</td>
                     <td class="product_name" data-id2="'.$row["id"].'" >'.$row["product_name"].'</td>
                     <td class="brand_name" data-id3="'.$row["id"].'" >'.$row["brand_name"].'</td>
                     <td class="scanned_datetime" data-id5="'.$row["id"].'">'.$row["scanned_datetime"].'</td>  
                    
                </tr>  
           ';  
      }  
     
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
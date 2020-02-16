<?php  
 include_once 'conn.php';
 
 $output = ''; 
 $sql = "SELECT * FROM inventory ORDER BY item_count DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
    <div class="table-responsive">  
        <table class="table table-bordered table-striped">  
          ';  
 if(mysqli_num_rows($result) > 0)  
 {  
   
     while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                    <td class="image_thumb_url" data-id4="'.$row["id"].'" ><img src='.$row["image_thumb_url"].' width=100px height=120px></img></td>      
                    <td>
                    <div class="item_count" data-id6="'.$row["item_count"].'" >'.$row["item_count"].'</div> 
                    <div class="scanned_txt" data-id1="'.$row["id"].'" >'.$row["scanned_txt"].'</div>
                    <div class="product_name" data-id2="'.$row["id"].'" >'.$row["product_name"].'</div>
                    <div class="brand_name" data-id3="'.$row["id"].'" >'.$row["brand_name"].'</div>
                    <div class="moved_time" data-id5="'.$row["id"].'">'.$row["moved_time"].'</div>  
                    </td>           
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
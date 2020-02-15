<?php  
 include_once 'conn.php';
 
 $output = ''; 
 $sql = "SELECT * FROM scanned_item ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="4%">id</th>  
                     <th width="10%">scanned_test</th>  
                     <th width="10%">product_name</th>
                     <th width="10%">brand_name</th> 
                     <th width="10%">image_thumb_url</th>
                     <th width="10%">op</th> 
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="scanned_txt" data-id1="'.$row["id"].'" contenteditable>'.$row["scanned_txt"].'</td>
                     <td class="product_name" data-id2="'.$row["id"].'" contenteditable>'.$row["product_name"].'</td>
                     <td class="brand_name" data-id3="'.$row["id"].'" contenteditable>'.$row["brand_name"].'</td>
                     <td class="image_thumb_url" data-id4="'.$row["id"].'" contenteditable><img src='.$row["image_thumb_url"].'></img></td>   
                     <td><button type="button" name="delete_btn" data-id5="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>
                <td id="scanned_txt" contenteditable>barcode</td>  
                <td id="product_name" contenteditable>product name</td>
                <td id="brand_name" contenteditable>brand name</td> 
                <td id="image_thumb_url" contenteditable>thumb.png</td> 
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
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
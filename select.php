<?php  
 include_once 'conn.php';
 
 $output = ''; 
 $sql = "SELECT * FROM scanned_item ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered table-striped">  
             ';  
 if(mysqli_num_rows($result) > 0)  
 {  
     $output .= '
     <tr>  
          <td id="image_thumb_url" contenteditable>thumb.png</td>
          <td>
               <button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Add</button>
               <div id="scanned_txt" contenteditable>barcode</div>  
               <div id="product_name" contenteditable>product name</div>
               <div id="brand_name" contenteditable>brand name</div>
          <td id="scanned_datetime"></td> 
            
     </tr>  
';   
     while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td class="image_thumb_url" data-id4="'.$row["id"].'" contenteditable><img src='.$row["image_thumb_url"].'></img>
                    
                     </td>
                     <td>
                     <button type="button" name="wish_btn" data-id8="'.$row["id"].'" class="btn btn-s btn-warning ">Wish</button>
                     <button type="button" name="stock_btn" data-id7="'.$row["id"].'" class="btn btn-s btn-success btn_stock">Stock</button>
                     <button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-s btn-danger btn_delete">Delete</button>   
                     <div class="scanned_txt" data-id1="'.$row["id"].'" contenteditable>'.$row["scanned_txt"].'</div>
                     <div class="product_name" data-id2="'.$row["id"].'" contenteditable>'.$row["product_name"].'</div>
                     <div class="brand_name" data-id3="'.$row["id"].'" contenteditable>'.$row["brand_name"].'</div>
                     </td>
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
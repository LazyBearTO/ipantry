<?php  
 include_once 'conn.php';
 
 $output = ''; 
 $sql = "SELECT * FROM scanned_item ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="4%">OP</th>  
                     <th width="10%">image</th>
                     <th>barcode</th>  
                     <th>product name</th>
                     <th>brand</th> 
                     <th width="15%">scanned_datetime</th>
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
     $output .= '  
     <tr>  
          <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Add</button></td>
          <td id="image_thumb_url" contenteditable>thumb.png</td>
          <td id="scanned_txt" contenteditable>barcode</td>  
          <td id="product_name" contenteditable>product name</td>
          <td id="brand_name" contenteditable>brand name</td>  
          <td id="scanned_datetime"></td> 
            
     </tr>  
';   
     while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                <td>
                    <button type="button" name="wish_btn" data-id8="'.$row["id"].'" class="btn btn-s btn-warning ">Wish</button>
                    <button type="button" name="stock_btn" data-id7="'.$row["id"].'" class="btn btn-s btn-success btn_stock">Stock</button>
                    <button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-s btn-danger btn_delete">Delete</button>
                </td>  
                     <td class="image_thumb_url" data-id4="'.$row["id"].'" contenteditable><img src='.$row["image_thumb_url"].'></img></td>     
                     <td class="scanned_txt" data-id1="'.$row["id"].'" contenteditable>'.$row["scanned_txt"].'</td>
                     <td class="product_name" data-id2="'.$row["id"].'" contenteditable>'.$row["product_name"].'</td>
                     <td class="brand_name" data-id3="'.$row["id"].'" contenteditable>'.$row["brand_name"].'</td>
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
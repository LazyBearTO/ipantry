<?php  
 include_once 'conn.php';
 
 $output = ''; 
 $sql = "SELECT * FROM scanned_item WHERE (moved_time IS NULL) ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive table-boarderless">  
           <table class="table table-striped">  
             ';
 $output .= '
          <tr>  
          <td id="image_thumb_url" contenteditable>thumb.png</td>
          <td>
               <div id="scanned_txt" contenteditable>barcode</div>  
               <div id="product_name" contenteditable>product name</div>
               <div id="brand_name" contenteditable>brand name</div>
               <button type="button" name="btn_add" id="btn_add" class="btn btn-s btn-primary" style="float: right;margin-top:-50px">Add</button></td>
           <td>
          </tr>
          ';    
 if(mysqli_num_rows($result) > 0)  
 {  
    
     while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td class="image_thumb_url" data-id4="'.$row["id"].'"><img src='.$row["image_thumb_url"].' width=100px height=120px></img>
                     </td>
                     <td>
                     <div class="scanned_txt" data-id1="'.$row["id"].'" contenteditable>'.$row["scanned_txt"].'</div>
                     <div class="product_name" data-id2="'.$row["id"].'" contenteditable>'.$row["product_name"].'</div>
                     <div class="brand_name" data-id3="'.$row["id"].'" contenteditable>'.$row["brand_name"].'</div>
                     <div class="scanned_datetime" data-id5="'.$row["id"].'">'.$row["scanned_datetime"].'</div>
                     <button type="button" name="wish_btn" data-id8="'.$row["id"].'" class="btn btn-s btn-warning ">Wish</button>
                     <button type="button" name="stock_btn" data-id7="'.$row["id"].'" class="btn btn-s btn-success btn_stock">Stock</button>
                     <button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-s btn-danger btn_delete">Delete</button>   
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
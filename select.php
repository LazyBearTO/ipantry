<?php  
 include_once 'conn.php';
 
 $output = ''; 
 $sql = "SELECT * FROM scanned_item ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive table-boarderless">  
          <table class="table table-responsive">
          <tr>  
               <td colspan=2>      
               <img src="img/barcode.png" >
               <input id="scanned_txt" type="text" placeholder="068400584742"/>
               <button type="button" name="btn_add" id="btn_add" class="btn btn-s btn-primary" >Scan</button>
               </td>
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
                    
                     <button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-s btn-danger btn_delete">To Trash</button>
                  
                     ';
          if ($row["stock_datetime"] != NULL){
               $output .= '<button type="button" name="stock_btn" data-id7="'.$row["id"].'" class="btn btn-s btn-success btn_stock" disabled>In Pantry</button>';
          }else{
               $output .= '<button type="button" name="stock_btn" data-id9="'.$row["id"].'" class="btn btn-s btn-success btn_stock" >Stock It</button>';

          }
          $output .= ' </td>
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
  <script type="text/javascript">
      
     function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }   
   
     $('#scanned_txt').keypress(function(event){
          var keycode = (event.keyCode ? event.keyCode : event.which);
          if(keycode == '13'){
               var scanned_txt = $('#scanned_txt')[0].value;
               if(scanned_txt == '')  
               {  
                    alert("Enter barcode");  
                    return false;  
               }
              
               $.ajax({  
                    url:"insert.php",  
                    method:"POST",  
                    data:{scanned_txt:scanned_txt},  
                    dataType:"text",  
                    success:function(data)  
                    {  
                         //alert(data);  
                         fetch_data();
                         
                    }  
               })
                //$('#scanned_txt')[0].focus();
               //document.getElementById("scanned_txt").focus(); 
          }
    
     event.stopPropagation();
     });          
 </script>
<?php  
 include_once 'conn.php';
 
 $sql = "SELECT count(*) from ipantry.inventory_item";
 $result = mysqli_query($connect, $sql); 
 $row = mysqli_fetch_array($result);
 //print_r($row);
 //die();
 $total = $row["count(*)"];
 $sql = "SELECT  *, count(scanned_txt)  FROM ipantry.inventory_item GROUP BY scanned_txt";
 $result = mysqli_query($connect, $sql);  
 
 $output .= '  
    <div class="table-responsive">  
        <table class="table table-bordered table-striped">
          <tr>  
               <td colspan=2 >      
               <div class="numberCircle">'.$total.'</div>
               </td>
          </tr>  
          ';  
 if(mysqli_num_rows($result) > 0)  
 {  
   //print_r($result);
     while($row = mysqli_fetch_array($result))  
      {   
          $output .= '  
                <tr>  
                    <td class="image_thumb_url" data-id4="'.$row["id"].'"><img src='.$row["image_thumb_url"].' width=100px height=120px></img></td>      
                    <td>
                    <div class="count(scanned_txt)" data-id6="'.$row["count(scanned_txt)"].'" >'.$row["count(scanned_txt)"].'</div> 
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
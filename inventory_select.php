<?php
include_once 'db/conn.php';
include_once 'db/dao.php';

$sql = "SELECT  * FROM ipantry.scanned_item GROUP BY scanned_txt ORDER BY lastop_datetime DESC";
$result = mysqli_query($connect, $sql);

$count_total = get_total_count();

$output = "";
$output .= '  
   <div class="table-boarderless">  
          <h4 align="center">            
          <div align="middle">
               <font color=blue>' . $count_total["undecided"] . "</font>/<font color=green>" . $count_total["left"] . '</font>
               <font color=red>' . $count_total["trashed"] . "</font>/<font color=green>" . $count_total["stocked"] . "</font>/<font color=blue>" . $count_total["scanned"]  . '</font>
               </div>
          </h4>     
          <table class="table table-responsive">
          ';
if (mysqli_num_rows($result) > 0) {
     //print_r($result);
     while ($row = mysqli_fetch_array($result)) {
          $count = get_count($row["scanned_txt"]);
          $output .= '  
                <tr>  
                    <td><img src=' . $row["image_thumb_url"] . ' class="img-fluid img-thumbnail"></img>            
                    </td>      
                    <td>
                    <div>' . $row["scanned_txt"] . '</div>
                    <div>' . $row["product_name"] . '</div>
                    <div>' . $row["brand_name"] . '</div>
                    <div>' . $row["lastop_datetime"] . '</div>
                    <div><font color=blue>' . $count["undecided"] . '</font>/<font color=green>' . $count["left"] . '</font></div>
                     <div>
                         <font color=red>' . $count["trashed"] . "</font>/<font color=green>" . $count["stocked"] . "</font>/<font color=blue>" . $count["scanned"]  . '</font>
                    </div>
                    </td>           
                </tr>  
           ';
     }
} else {
     $output .= '<tr>  
                    <td colspan="4">Data not Found</td>  
                  </tr>';
}
$output .= '</table>  
      </div>';
echo $output;

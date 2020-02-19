<?php
include_once 'db/conn.php';
include_once 'db/dao.php';

$sql = "SELECT * FROM scanned_item GROUP BY scanned_txt ORDER BY lastop_datetime DESC";
$result = mysqli_query($connect, $sql);

$count_total = get_total_count();

$output = '';
$output .= '  
    <div class="table-boarderless">
    <h4 align="center">            
    <div align="middle">
         <font color=blue>' . $count_total["undecided"] . "</font>/<font color=green>" . $count_total["left"] . '</font>
         <font color=red>' . $count_total["trashed"] . "</font>/<font color=green>" . $count_total["stocked"] . "</font>/<font color=blue>" . $count_total["scanned"]  . '</font>
         </div>
    </h4>       
    <table class="table table-boarderless" >
          ';
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $count = get_count($row["scanned_txt"]);
        //$img_height = fix_image_ratio(100, $row["image_thumb_url"]);
        if ($row["lastop_datetime"] = $row["stock_datetime"])
            $color = "#5cb85c";
        elseif ($row["lastop_datetime"] = $row["trash_datetime"])
            $color = "#c9302c";
        elseif ($row["lastop_datetime"] = $row["scanned_datetime"])
            $color = "#286090";

        $output .= '  
                <tr>  
                     <td class="image_thumb_url " data-id4="' . $row["id"] . '"><img src=' . $row["image_thumb_url"] . ' class="img-fluid img-thumbnail"></img>
                         
                     </td>
                     <td>
                     <div class="scanned_txt" data-id1="' . $row["id"] . '" contenteditable>' . $row["scanned_txt"] . '</div>
                     <div class="product_name" data-id2="' . $row["id"] . '" contenteditable>' . $row["product_name"] . '</div>
                     <div class="brand_name" data-id3="' . $row["id"] . '" contenteditable>' . $row["brand_name"] . '</div>       
                     ';

        $output .= '
                     <div><font color=blue>' . $count["undecided"] . '</font>/<font color=green>' . $count["left"] . '</font>
                         <font color=red>' . $count["trashed"] . "</font>/<font color=green>" . $count["stocked"] . "</font>/<font color=blue>" . $count["scanned"]  . '</font>
                         </div> ';
        //if ($count["undecided"] > 0) {
        // if (($row["trash_datetime"] == NULL) and ($row["stock_datetime"] == NULL)) {
        $output .= '<button ';
        if (($count["undecided"] < 1) or ($count["left"] < 1))
            $output .= 'disabled ';
        $output .= 'type="button" name="delete_btn" data-id6="' . $row["scanned_txt"] . '" class="btn btn-s btn-danger btn_delete" >Trash</button>';
        $output .= '   ';
        $output .= '<button ';
        if ($count["undecided"] < 1)
            $output .= 'disabled ';
        $output .= 'type="button" name="stock_btn" data-id9="' . $row["scanned_txt"] . '" class="btn btn-s btn-success btn_stock" >Stock(' . $count["left"] . ')</button>';


        // } else if ($row["trash_datetime"] != NULL) {
        //     $output .= '<div class="trash_datetime" style="color:#c9302c;">' . $row["trash_datetime"] . '</div>';
        // } else if ($row["stock_datetime"] != NULL) {
        //     $output .= '<div class="stock_datetime" style="color:#5cb85c;">' . $row["stock_datetime"] . '</div>';
        //}

        // if ($row["stock_datetime"] != NULL) {
        //     $output .= '<button type="button" name="stock_btn" data-id7="' . $row["id"] . '" class="btn btn-s btn-success btn_stock" disabled>In Pantry</button>';
        // } else {
        //     $output .= '<button type="button" name="stock_btn" data-id9="' . $row["id"] . '" class="btn btn-s btn-success btn_stock" >To Pantry</button>';
        // }
        $output .= ' </td>
               
            </tr>  
           ';
    }
} else {
    $output .= '<tr>  
                    <td colspan="2">Data not Found</td>  
                </tr>';
}
$output .= '  
      </div>';
echo $output;

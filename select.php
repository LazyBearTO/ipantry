<?php
include_once 'db/conn.php';
$output = '';
$sql = "SELECT * FROM scanned_item ORDER BY scanned_datetime DESC, stock_datetime ASC";
$result = mysqli_query($connect, $sql);
$output .= '  
            <div class="table-boarderless">
                 <table class="table table-boarderless" >
          ';
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

        //$img_height = fix_image_ratio(100, $row["image_thumb_url"]);
        $output .= '  
                <tr>  
                     <td class="image_thumb_url " data-id4="' . $row["id"] . '"><img src=' . $row["image_thumb_url"] . ' class="img-fluid img-thumbnail"></img>
                     </td>
                     <td>
                     <div class="scanned_txt" data-id1="' . $row["id"] . '" contenteditable>' . $row["scanned_txt"] . '</div>
                     <div class="product_name" data-id2="' . $row["id"] . '" contenteditable>' . $row["product_name"] . '</div>
                     <div class="brand_name" data-id3="' . $row["id"] . '" contenteditable>' . $row["brand_name"] . '</div>
                      <div class="scanned_datetime" style="color:#286090;">' . $row["scanned_datetime"] . '</div>            
                     ';
        if (($row["trash_datetime"] == NULL) and ($row["stock_datetime"] == NULL)) {
            $output .= '<button type="button" name="delete_btn" data-id6="' . $row["id"] . '" class="btn btn-s btn-danger btn_delete">Trash</button>';
            $output .= '   ';
            $output .= '<button type="button" name="stock_btn" data-id9="' . $row["id"] . '" class="btn btn-s btn-success btn_stock" >Pantry</button>';
        } else if ($row["trash_datetime"] != NULL) {
            $output .= '<div class="trash_datetime" style="color:#c9302c;">' . $row["trash_datetime"] . '</div>';
        } else if ($row["stock_datetime"] != NULL) {
            $output .= '<div class="trash_datetime" style="color:#5cb85c;">' . $row["stock_datetime"] . '</div>';
        }

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

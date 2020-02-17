<?php
include_once 'conn.php';
include_once 'util.php';
$output = '';
$sql = "SELECT * FROM scanned_item ORDER BY id DESC";
$result = mysqli_query($connect, $sql);
$output .= '  
      <div class="table  table-boarderless">
            <h4 align="center">
            <img src="img/barcode.png" >
            <input id="scanned_txt" type="text" placeholder="068400584742"/>
            <button type="button" name="btn_add" id="btn_add" class="btn btn-s btn-primary" >Scan</button>
            </h4>
                <div class="table-responsive table-boarderless">
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
                     <div class="scanned_txt " data-id1="' . $row["id"] . '" contenteditable>' . $row["scanned_txt"] . '</div>
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
$output .= '</table>  
      </div>';
echo $output;
?>
<script type="text/javascript">
    function fetch_data() {
        $.ajax({
            url: "select.php",
            method: "POST",
            success: function(data) {
                $('#live_data').html(data);
            }
        });
    }

    $('#scanned_txt').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            var scanned_txt = $('#scanned_txt')[0].value;
            if (scanned_txt == '') {
                alert("Enter barcode");
                return false;
            }

            $.ajax({
                url: "insert.php",
                method: "POST",
                data: {
                    scanned_txt: scanned_txt
                },
                dataType: "text",
                success: function(data) {
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
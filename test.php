<?php

$str_barcode = "5449000000996";

function get_count(string $str_barcode)
{
    $connect = mysqli_connect("localhost", "ipantry", "ipantry", "ipantry");
    $sql = "select";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE scanned_txt =" . $str_barcode . ") as Total, ";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE scanned_txt =" . $str_barcode . " and scanned_datetime is not null) as Scanned, ";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE scanned_txt =" . $str_barcode . " and stock_datetime is not null) as Stocked, ";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE scanned_txt =" . $str_barcode . " and trash_datetime is not null) as Trashed";


    $result = mysqli_query($connect, $sql);
    //echo $sql . "<br />";
    //exit();
    //var_dump($result);
    //echo mysqli_num_rows($result) > 0;
    if (mysqli_num_rows($result) > 0) {
        //exit();
        $row = mysqli_fetch_array($result);

        $count["total"] = $row["Total"];
        $count["scanned"] = $row["Scanned"];
        $count["stocked"] = $row['Stocked'];
        $count["trashed"] = $row['Trashed'];
        print_r($count);
        return $count;
    }
}
get_count($str_barcode);

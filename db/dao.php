<?php
//include_once 'db/conn.php';

function get_total_count()
{
    $connect = mysqli_connect("localhost", "ipantry", "ipantry", "ipantry");
    $sql = "select";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item ) as Total, ";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE scanned_datetime is not null) as Scanned, ";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE stock_datetime is not null) as Stocked, ";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE  trash_datetime is not null) as Trashed";


    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        //exit();
        $row = mysqli_fetch_array($result);

        $count["total"] = $row["Total"];
        $count["scanned"] = $row["Scanned"];
        $count["stocked"] = $row['Stocked'];
        $count["trashed"] = $row['Trashed'];
        $count["left"] = $row['Stocked'] - $row['Trashed'];
        $count["undecided"] = $row['Scanned'] - $row['Trashed'] - $row['Stocked'];
        return $count;
    }
}

function get_count(string $str_barcode)
{
    $connect = mysqli_connect("localhost", "ipantry", "ipantry", "ipantry");
    $sql = "select";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE scanned_txt ='" . $str_barcode . "') as Total, ";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE scanned_txt ='" . $str_barcode . "' and scanned_datetime is not null) as Scanned, ";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE scanned_txt ='" . $str_barcode . "' and stock_datetime is not null) as Stocked, ";
    $sql .= "(SELECT count(scanned_txt)  FROM ipantry.scanned_item WHERE scanned_txt ='" . $str_barcode . "' and trash_datetime is not null) as Trashed";


    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        //exit();
        $row = mysqli_fetch_array($result);

        $count["total"] = $row["Total"];
        $count["scanned"] = $row["Scanned"];
        $count["stocked"] = $row['Stocked'];
        $count["trashed"] = $row['Trashed'];
        $count["left"] = $row['Stocked'] - $row['Trashed'];
        $count["undecided"] = $row['Scanned'] - $row['Trashed'] - $row['Stocked'];
        //print_r($count);
        return $count;
    }
}


function lookup_local_db(string $str_barcode)
{
    $connect = mysqli_connect("localhost", "ipantry", "ipantry", "ipantry");
    $sql = "SELECT * FROM inventory_item WHERE(sanned_txt=.$str_barcode.)";
    if (mysqli_query($connect, $sql)) {
        echo $sql . "\n";
    }
    return False;
}

function lookup_remote_db(string $str_barcode)
{

    $url = "https://OFF.openfoodfacts.org/api/v0/product/" . $str_barcode . ".json";
    //echo $url;
    //exit();
    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // grab URL and pass it to the browser
    $result = json_decode(curl_exec($ch), true);
    // echo "<hr />";
    //var_dump($result);

    // echo "<hr />";
    //print_r($result);
    //print_r($result['status']);
    // close cURL resource, and free up system resources
    curl_close($ch);

    //exit();

    //no found
    if ($result["status"] == 0) {
        //echo $result['status'];
        return 0;
    } else
        //found     
        return db_array_to_scanned_item($result['product']);
    //return $result['product'];
}

function db_array_to_scanned_item(array $arry_product)
{
    //print_r($arry_product);
    //var_dump(array_key_exists("status", $arry_product));
    // var_dump(array_key_exists("code", $arry_product));
    // var_dump(array_key_exists("product_name", $arry_product));
    // var_dump(array_key_exists("brands", $arry_product));
    // var_dump(array_key_exists("image_small_url", $arry_product));

    $scanned_item['scanned_txt'] = $arry_product['code'];
    $scanned_item['product_name'] = $arry_product['product_name'];
    $scanned_item['brand_name'] = $arry_product['brands'];
    $scanned_item['image_thumb_url'] = $arry_product['image_small_url'];

    return $scanned_item;
}

// echo "<hr />ss<br />";
//print_r(lookup_db("6111035000058"));

<?php

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


//lookup local db, return top 1 result
function lookup_local_db(string $str_barcode)
{
    $connect = mysqli_connect("localhost", "ipantry", "ipantry", "ipantry");
    $sql = "SELECT * FROM scanned_item WHERE(scanned_txt='$str_barcode')  ORDER BY lastop_datetime DESC LIMIT 1";
    $result = mysqli_query($connect, $sql);

    if ($row = mysqli_fetch_array($result))
        //echo $sql . "<br />";
        return $row;
    else
        return NULL;
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
//remote result_array to sanned_item
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
function scan_item_into_db($scanned_txt)
{
    $connect = mysqli_connect("localhost", "ipantry", "ipantry", "ipantry");
    $scanned_item = lookup_remote_db($scanned_txt);
    if ($scanned_item) {
        $product_name = mysqli_real_escape_string($connect, $scanned_item['product_name']);
        $brand_name = mysqli_real_escape_string($connect, $scanned_item['brand_name']);
        $image_thumb_url = mysqli_real_escape_string($connect, $scanned_item['image_thumb_url']);
        $sql = "INSERT INTO scanned_item(scanned_txt, product_name, brand_name, image_thumb_url, scanned_datetime, lastop_datetime) 
        VALUES('" . $scanned_txt . "',
               '" . $product_name . "',
               '" . $brand_name . "',
               '" . $image_thumb_url . "',
               NOW(),NOW()
               )";
    } else {
        // no found, just insert barcode, no other info
        $sql = "INSERT INTO scanned_item(scanned_txt, scanned_datetime, lastop_datetime) 
        VALUES('" . $scanned_txt . "', NOW(), NOW())";
    }
    //echo $sql;
    // exit();
    if (mysqli_query($connect, $sql)) {
        echo $sql;
    }
}

function stock_item_into_db($scanned_txt)
{
    $connect = mysqli_connect("localhost", "ipantry", "ipantry", "ipantry");
    //$scanned_item = lookup_local_db($scanned_txt);
    if (lookup_local_db($scanned_txt)) {
        echo "found local";
        $scanned_item = lookup_local_db($scanned_txt);
    } elseif (lookup_remote_db($scanned_txt)) {
        echo "found remote ";
        $scanned_item = lookup_remote_db($scanned_txt);
    } else {
        echo "no found neither local nor remote db";
    }
    //die();



    //$scanned_item = lookup_remote_db($scanned_txt);

    if ($scanned_item) {
        $product_name = mysqli_real_escape_string($connect, $scanned_item['product_name']);
        $brand_name = mysqli_real_escape_string($connect, $scanned_item['brand_name']);
        $image_thumb_url = mysqli_real_escape_string($connect, $scanned_item['image_thumb_url']);
        $sql = "INSERT INTO scanned_item(scanned_txt, product_name, brand_name, image_thumb_url, stock_datetime, lastop_datetime) 
        VALUES('" . $scanned_txt . "',
               '" . $product_name . "',
               '" . $brand_name . "',
               '" . $image_thumb_url . "',
               NOW(),
               NOW()
               )";
    } else {
        // no found, just insert barcode, no other info
        $sql = "INSERT INTO scanned_item(scanned_txt, stock_datetime, lastop_datetime) 
        VALUES('" . $scanned_txt . "', NOW(), NOW())";
    }
    // echo $sql;
    // exit();
    if (mysqli_query($connect, $sql)) {
        echo $sql;
    }
}


function trash_item_into_db($scanned_txt)
{
    $connect = mysqli_connect("localhost", "ipantry", "ipantry", "ipantry");


    if (lookup_local_db($scanned_txt)) {
        echo "found local";
        $scanned_item = lookup_local_db($scanned_txt);
    } elseif (lookup_remote_db($scanned_txt)) {
        echo "found remote ";
        $scanned_item = lookup_remote_db($scanned_txt);
    } else {
        echo "no found neither local nor remote db";
    }
    //die();


    //$scanned_item = lookup_remote_db($scanned_txt);
    if ($scanned_item) {
        $product_name = mysqli_real_escape_string($connect, $scanned_item['product_name']);
        $brand_name = mysqli_real_escape_string($connect, $scanned_item['brand_name']);
        $image_thumb_url = mysqli_real_escape_string($connect, $scanned_item['image_thumb_url']);
        $sql = "INSERT INTO scanned_item(scanned_txt, product_name, brand_name, image_thumb_url, trash_datetime, lastop_datetime) 
        VALUES('" . $scanned_txt . "',
               '" . $product_name . "',
               '" . $brand_name . "',
               '" . $image_thumb_url . "',
               NOW(),
               NOW()
               )";
    } else {
        // no found, just insert barcode, no other info
        $sql = "INSERT INTO scanned_item(scanned_txt, trash_datetime, lastop_datetime) 
        VALUES('" . $scanned_txt . "', NOW(), NOW())";
    }
    // echo $sql;
    // exit();
    if (mysqli_query($connect, $sql)) {
        echo $sql;
    }
}

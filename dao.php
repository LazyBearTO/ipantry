<?php

function lookup_db(string $str_barcode) {
    
    $url = "https://OFF.openfoodfacts.org/api/v0/product/".$str_barcode.".json";
    //echo $url;
    //exit();
    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // grab URL and pass it to the browser
    $result=json_decode(curl_exec($ch), true);
    // echo "<hr />";
    // var_dump($result);
    // echo "<hr />";
    //print_r($result['status']);
    // close cURL resource, and free up system resources
    curl_close($ch);
    //return  $result['status'];
    if($result['status']=="0")
        return "0";
    else   
                 
        return db_array_to_scanned_item($result['product']);
}

function db_array_to_scanned_item($arry_product){
    
    $scanned_item['scanned_txt'] = $arry_product['code'];
    $scanned_item['product_name']=$arry_product['product_name'];
    $scanned_item['brand_name']=$arry_product['brands'];
    $scanned_item['image_thumb_url']=$arry_product['image_thumb_url'];
    $scanned_item['image_small_url']=$arry_product['image_small_url'];
    $scanned_item['image_url']=$arry_product['image_url'];
    // echo "<hr />";
    // print_r($arry_product);
    return $scanned_item;
}

// echo "<hr />ss<br />";
//print_r(lookup_db("6111035000058"));

?>
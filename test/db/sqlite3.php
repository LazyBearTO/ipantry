<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$db = new SQLite3('ipantry.db');

$results = $db->query('SELECT * FROM scanned_item');
while ($row = $results->fetchArray()) {
    var_dump($row);
}
//var_dump(($results));

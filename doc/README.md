# ipantry

https://youtu.be/cfZdNDRAFEo DEMO

scan barcode of food package to display info(barcode reader + raspberry pi)

1.scan.py
  
   a.read usb barcode scanner from 'dev/hidraw0/'

   b.lookup barcode from openfoodfacts.org

   c.insert into mysql ipantry.scanned_item
  
2.ipantry.sql

   a.DDL for mysql
  
3.index.php

   a. Ajax+Jquery+php+mysql + https://www.webslesson.info/2016/02/live-table-add-edit-delete-using-ajax-jquery-in-php-mysql.html

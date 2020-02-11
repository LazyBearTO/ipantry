# ipantry
scan barcode of food package to display info(barcode reader + raspberry pi)

1.ipantry.py
  
   a.read usb barcode scanner from 'dev/hidraw0/'

   b.lookup barcode from openfoodfacts.org

   c.insert into mysql ipantry.scanned_item
  
2.ipantry.sql

   a.DDL for mysql
  
3.index.php

   a.Datatables show the data

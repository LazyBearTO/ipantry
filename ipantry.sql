DROP TABLE IF EXISTS `ipantry`.`scanned_item` ;

CREATE TABLE IF NOT EXISTS `ipantry`.`scanned_item`(
 scanned_id INT NOT NULL AUTO_INCREMENT,
 scanned_datetime datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 scanned_txt VARCHAR(255) NOT NULL,
 product_name VARCHAR(255),
 brand_name VARCHAR(255),
 image_thumb_url VARCHAR(255),
 image_small_url VARCHAR(255),
 image_url VARCHAR(255),
 PRIMARY KEY (scanned_id));

#!/usr/bin/python
import urllib2
import json
import mysql.connector
import time

def listToString(s):
    
    # initialize an empty string 
    str1 = ""  
    
    # traverse in the string   
    for ele in s:  
        str1 += str(ele)   
    
    # return string   
    return str1  

def read_hid():

    hid = { 4: 'a', 5: 'b', 6: 'c', 7: 'd', 8: 'e', 9: 'f', 10: 'g', 11: 'h', 12: 'i', 13: 'j', 14: 'k', 15: 'l', 16: 'm', 17: 'n', 18: 'o', 19: 'p', 20: 'q', 21: 'r', 22: 's', 23: 't', 24: 'u', 25: 'v', 26: 'w', 27: 'x', 28: 'y', 29: 'z', 30: '1', 31: '2', 32: '3', 33: '4', 34: '5', 35: '6', 36: '7', 37: '8', 38: '9', 39: '0', 44: ' ', 45: '-', 46: '=', 47: '[', 48: ']', 49: '\\', 51: ';' , 52: '\'', 53: '~', 54: ',', 55: '.', 56: '/'  }

    hid2 = { 4: 'A', 5: 'B', 6: 'C', 7: 'D', 8: 'E', 9: 'F', 10: 'G', 11: 'H', 12: 'I', 13: 'J', 14: 'K', 15: 'L', 16: 'M', 17: 'N', 18: 'O', 19: 'P', 20: 'Q', 21: 'R', 22: 'S', 23: 'T', 24: 'U', 25: 'V', 26: 'W', 27: 'X', 28: 'Y', 29: 'Z', 30: '!', 31: '@', 32: '#', 33: '$', 34: '%', 35: '^', 36: '&', 37: '*', 38: '(', 39: ')', 44: ' ', 45: '_', 46: '+', 47: '{', 48: '}', 49: '|', 51: ':' , 52: '"', 53: '~', 54: '<', 55: '>', 56: '?'  }

    fp = open('/dev/hidraw0', 'rb')
    ss = ""
    shift = False

    done = False

    while not done:

        ## Get the character from the HID
        buffer = fp.read(8)
        for c in buffer:
            if ord(c) > 0:

                ##  40 is carriage return which signifies
                ##  we are done looking for characters
                if int(ord(c)) == 40:
                    done = True
                    break;

                ##  If we are shifted then we have to 
                ##  use the hid2 characters.
                if shift: 

                    ## If it is a '2' then it is the shift key
                    if int(ord(c)) == 2 :
                        shift = True

                    ## if not a 2 then lookup the mapping
                    else:
                        ss += hid2[ int(ord(c)) ]
                        shift = False

                ##  If we are not shifted then use
                ##  the hid characters

                else:

                    ## If it is a '2' then it is the shift key
                    if int(ord(c)) == 2 :
                        shift = True

                    ## if not a 2 then lookup the mapping
                    else:
                        ss += hid[ int(ord(c)) ]           
    return ss

def lookup_db(str_barcode):
#open a connection to a URL using urllib2
  product = {} 
  url = "https://OFF.openfoodfacts.org/api/v0/product/" + str_barcode + ".json"
  webUrl = urllib2.urlopen(url)
  #print(url)
#get the result code and print it
  #print("result code: " + str(webUrl.getcode()))
  
# read the data from the URL and print it
  data = json.loads(webUrl.read())
  # for x, y in data.items():
  #   print(x, y)
  #print (data)
  if data["status"] ==0:
    product["product_id"] = str_barcode
    product["product_name"] = ""
    product["brand_name"] = ""
    product["image_thumb_url"] = ""
    product["image_small_url"] = ""
    product["image_url"] = ""
    return product
  
  if "product_id" in data['product']:
      product["product_id"] = data['product']['_id']
  else:
      product["product_id"] = str_barcode

  if "product_name" in data['product']:
      product["product_name"] = data['product']['product_name']
  else:
      product["product_name"] = ""

  if "brands" in data['product']:
      product["brand_name"] = data['product']['brands']
  else:
      product["brand_name"] = ""

  if "image_thumb_url" in data['product']:
      product["image_thumb_url"] = data['product']['image_thumb_url']
  else:
      product["image_thumb_url"] = ""

  if "image_url" in data['product']:
      product["image_url"] = data['product']['image_url']
  else:
      product["image_url"] = ""

  if "image_small_url" in data['product']:
      product["image_small_url"] = data['product']['image_small_url']
  else:
      product["image_small_url"] = ""
  return product

def insert_db(str_barcode):

    mydb = mysql.connector.connect(
    #host="99.79.195.105",
    host="localhost",
    user="joey",
    passwd="joey",
    database="ipantry"
    )
    mycursor = mydb.cursor()

    if len(str_barcode) == 0:
        print("empty input")
    else:
        record = [str_barcode]
        product = lookup_db(str_barcode)
        for x, y in product.items():
            print(x, y)
        product_name = product['product_name']
        brand_name = product['brand_name']
        image_thumb_url = product['image_thumb_url']
        image_small_url = product['image_small_url']
        image_url = product['image_url']
        
        mycursor.execute("insert into ipantry.scanned_item (scanned_txt, product_name, brand_name, image_thumb_url, image_small_url, image_url) values(%s, %s, %s, %s, %s, %s)", (str_barcode, product_name, brand_name, image_thumb_url, image_small_url, image_url))
        mydb.commit()
        #print("["+listToString(record)+"]")

def main():

    while True:
        #read from scanner
        ss = read_hid()    
        #insert into db
        print "---------------------------------------------------------"
        insert_db(ss)
        print "---------------------------------------------------------"
        print time.ctime()
        print "---------------------------------------------------------\n"

if __name__== "__main__":
  main()

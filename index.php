<html>  
      <head>  
           <title>scanned</title>
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <div class="table-borderless">  
                     <h3 align="center">
                     <a href="."><button type="button" class="btn btn-primary btn-lg active">Scanned</button></a>
                     <a href="inventory.php"><button type="button" class="btn btn-success btn-lg inactive">Inventory</button></a>
                     <button type="button" class="btn btn-warning btn-lg inactive">Wishlist</button>
                    </div>               
                     </h3>
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var scanned_txt = $('#scanned_txt').text();  
           var product_name = $('#product_name').text(); 
           var brand_name = $('#brand_name').text(); 
           var image_thumb_url = $('#image_thumb_url').text(); 
           if(scanned_txt == '')  
           {  
                alert("Enter barcode");  
                return false;  
           }  
           if(product_name == '')  
           {  
                alert("Enter product_name");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{image_thumb_url:image_thumb_url, scanned_txt:scanned_txt, product_name:product_name, brand_name:brand_name},  
                dataType:"text",  
                success:function(data)  
                {  
                     //alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     //alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.scanned_txt', function(){  
           var id = $(this).data("id1");  
           var scanned_txt = $(this).text();  
           edit_data(id, scanned_txt, "scanned_txt");  
      });  
      $(document).on('blur', '.product_name', function(){  
           var id = $(this).data("id2");  
           var product_name = $(this).text();  
           edit_data(id, product_name, "product_name");  
      });
      $(document).on('blur', '.brand_name', function(){  
           var id = $(this).data("id3");  
           var brand_name = $(this).text();  
           edit_data(id, brand_name, "brand_name");  
      });
      $(document).on('blur', '.image_thumb_url', function(){  
           var id = $(this).data("id4");  
           var image_thumb_url = $(this).text();  
           edit_data(id, image_thumb_url, "image_thumb_url");  
      }); 
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id6");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          //alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      }); 
      $(document).on('click', '.btn_stock', function(){  
           var id=$(this).data("id7");  
          //  var scanned_txt = $(this).data("scanned_txt");  
          //  var product_name = $('#product_name').text(); 
          //  var brand_name = $('#brand_name').text(); 
          //  var image_thumb_url = $('#image_thumb_url').text(); 
           //if(confirm("Are you sure you want to stock this?"))  
           {  
                $.ajax({  
                     url:"stock.php",  
                     method:"POST",  
                     data:{id:id},   
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           } 
      });  
 });  
 </script>
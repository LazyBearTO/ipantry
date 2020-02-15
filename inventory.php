<html>  
      <head>  
           <title>inventory</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <div class="table-responsive">  
                     <h3 align="center">
                     <a href="."><button type="button" class="btn btn-primary btn-lg active">Scanned</button></a>
                     <a href="inventory.php"><button type="button" class="btn btn-success btn-lg inactive">Inventory</button></a>
                     <button type="button" class="btn btn-warning btn-lg inactive">Wishlist</button>   
               </div>               
                     </h3><br />  
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
                url:"inventory_select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
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
    
      
 });  
 </script>
<!DOCTYPE html>
<html>
<head>
	<title>iPantry</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	</head>
<body class="gb-info">
	<div class="container">
		<h1 class="text-center">iPantry</h1>
		<div>
			<table id="scanned_item"class="table table-striped table-bordered table-hover">
	        	<thead>
	                <tr>
						<th>id</th>
						<th>barcode</th>
						<th>product_name</th>
						<th>brand_name</th>
						<th>product_pic</th>
						<th>scan_time</th>
					</tr>
	          	</thead>
	        	<tbody>
					<?php 
						 $conn = new mysqli("localhost","username","password","ipantry");
						 $sql = "SELECT * FROM scanned_item";
						 $res = $conn->query($sql);
						 while($row=$res->fetch_assoc()){					 
						
                        
                        ?> 
		        		<tr>
                        <td><?= $row['scanned_id']; ?></td>
                        <td><?= $row['scanned_txt']; ?></td>
                        <td><?= $row['product_name']; ?></td>
		        		<td><?= $row['brand_name']; ?></td>
		        		<td><a href="<?=$row['image_url'];?>" target="_blank"><img src =<?=$row['image_thumb_url'];?>></a></td>
		        		<td><?= $row['scanned_datetime']; ?></td>
                		</tr>
						 <?php } ?>
	        	</tbody>
      		</table>

      		
		</div>

<script type="text/javascript">
	$(document).ready(function(){
			$('table').DataTable({
				"order": [[ 0, "desc" ]]
			});
		});
</script>
</body>
</html>
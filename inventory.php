<html>

<head>
    <title>inventory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="table-borderless">
            <h3 align="center">
                <a href="."><button type="button" class="btn btn-primary btn-lg active">Scan</button></a>
                <a href="inventory.php"><button type="button" class="btn btn-success btn-lg inactive">Pantry</button></a>
                <button id="btn_reset" type="button" class="btn btn-warning btn-lg inactive">reset</button>
            </h3>
            <div id="live_data"></div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "inventory_select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                }
            });
        }
        fetch_data();

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "edit.php",
                method: "POST",
                data: {
                    id: id,
                    text: text,
                    column_name: column_name
                },
                dataType: "text",
                success: function(data) {
                    //alert(data);  
                }
            });
        }
        $(document).on('click', '#btn_reset', function() {

            if (confirm("Reset?")) {
                $.ajax({
                    url: "reset.php",
                    method: "POST",
                    success: function(data) {
                        alert(data);
                        fetch_data();
                    }
                })
            }
        });

    });
</script>
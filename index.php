<html>

<head>
    <title>scanned</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="table-borderless">
            <h3 align="center">
                <a href="."><button type="button" class="btn btn-primary btn-lg active">Home</button></a>
                <a href="dbr.html"><button type="button" class="btn btn-success btn-lg inactive">Scan</button></a>
                <button id="btn_reset" type="button" class="btn btn-warning btn-lg inactive">Reset</button>
            </h3>

            <input id="scanned_txt" type="text" class="form-control" placeholder="enter barcode here then press enter" style="display:table-column;width:80%" value="063348006936" />

            <button type="submit" name="btn_add" id="btn_add" class="btn btn-s btn-primary">Enter</button>

            <div id="live_data"></div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {
            var scanned_txt = $('#scanned_txt')[0].value;
            if (scanned_txt == '') {
                alert("Enter barcode");
                return false;
            }
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: {
                    scanned_txt: scanned_txt
                },
                dataType: "text",
                success: function(data) {
                    //alert(data);
                    fetch_data();
                }
            })
            $('#scanned_txt.form-control')[0].value = '';

        });

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
        $(document).on('blur', '.scanned_txt', function() {
            var id = $(this).data("id1");
            var scanned_txt = $(this).text();
            edit_data(id, scanned_txt, "scanned_txt");
        });
        $(document).on('blur', '.product_name', function() {
            var id = $(this).data("id2");
            var product_name = $(this).text();
            edit_data(id, product_name, "product_name");
        });
        $(document).on('blur', '.brand_name', function() {
            var id = $(this).data("id3");
            var brand_name = $(this).text();
            edit_data(id, brand_name, "brand_name");
        });
        $(document).on('blur', '.image_thumb_url', function() {
            var id = $(this).data("id4");
            var image_thumb_url = $(this).text();
            edit_data(id, image_thumb_url, "image_thumb_url");
        });
        $(document).on('click', '.btn_delete', function() {
            var scanned_txt = $(this).data("id6");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {
                        scanned_txt: scanned_txt
                    },
                    dataType: "text",
                    success: function(data) {
                        //alert(data);
                        fetch_data();
                    }
                });
            }
        });

        //stock button click
        $(document).on('click', '.btn_stock', function() {
            var scanned_txt = $(this).data("id9"); {
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {
                        scanned_txt: scanned_txt,
                        action: 'stock'
                    },
                    dataType: "text",
                    success: function(data) {
                        //alert(data);
                        fetch_data();
                    }
                });
            }
        });


        //keyboard enter pressed
        $('#scanned_txt').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                var input_scanned_txt = $('#scanned_txt.form-control');
                var scanned_txt = $('#scanned_txt')[0].value;
                if (scanned_txt == '') {
                    alert("Enter barcode");
                    return false;
                }

                //window.location = 'insert.php?q=' + scanned_txt;
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {
                        scanned_txt: scanned_txt
                    },
                    dataType: "text",
                    success: function(data) {
                        //alert(data);
                        fetch_data();
                    }
                })

                //$('#scanned_txt').autofocus();
                //input_scanned_txt[0].value = "";
                //input_scanned_txt[0].autofocus = 1;
                //('#scanned_txt').value = "22";
                //console.log(input_scanned_txt);
                //console.log("vali:" + $('#scanned_txt.form-control')[0].value)
                //document.getElementById("scanned_txt").focus(); 


                //clear the input
                $('#scanned_txt.form-control')[0].value = '';

            }
            event.stopPropagation();
        });
        //reset database
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
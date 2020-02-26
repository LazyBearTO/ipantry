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

     //insert item
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
    //edit tiem
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
    //edit scaned_txt
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

    //Trash item
    $(document).on('click', '.btn_delete', function() {
        var scanned_txt = $(this).data("id6");
        if (confirm("Trash this?")) {
            $.ajax({
                url: "trash.php",
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

    //stock item click
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

    //input keyboard enter pressed
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
                    //alert(data);
                    fetch_data();
                }
            })
        }
    });


    //listen message  from the iframe
    var eventMethod = window.addEventListener ?
        "addEventListener" :
        "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod === "attachEvent" ?
        "onmessage" :
        "message";

    //get message from brd.html
    eventer(messageEvent, function(e) {

        // if (e.origin !== 'http://the-trusted-iframe-origin.com') return;
        //alert(e.data);
        //console.log(e.data);
        $scanned_txt = e.data;

        //insert into database
        $.post("insert.php", {
                scanned_txt: $scanned_txt,
            },
            function(data, status) {
                fetch_data();
                //alert("Data: " + data + "\nStatus: " + status);
            });
    });


    //send msg to dbr.html
    document.querySelector('#btn_scan').onclick = function () {
        iFrame = document.getElementById('iframe')
        iFrame.contentWindow.postMessage("message", "*");

    }

    //dbr.html btn_close
    //console.log(document.querySelector('iframe'));
 


    
});
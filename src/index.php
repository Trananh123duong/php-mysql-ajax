<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <h3>Insert dữ liệu trong FORM</h3>
            <form action="" method="POST" id="insert_data_hoten">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" id="hovaten" placeholder="Điền họ và tên">
                <label for="">Số phone</label>
                <input type="text" class="form-control" id="sophone" placeholder="Số phone">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ">
                <label for="">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Email">
                <label for="">Ghi chú</label>
                <input type="text" class="form-control" id="ghichu" placeholder="ghi chú">
                <br>
                <input type="button" name="insert_data" id="button_insert" value="Insert" class="btn btn-success">
            </form>

            <h3>Load dữ liệu bảng bằng ajax</h3>
            <div id="load_data">

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            //list data
            function fetch_data() {
                $.ajax({
                    url: "ajax_action.php",
                    method: "POST",
                    success: function (data) {
                        $('#load_data').html(data);
                    }
                });
            }

            fetch_data();

            //edit data
            function edit_data(id, text, column_name) {
                $.ajax({
                    url: "ajax_action.php",
                    method: "POST",
                    data: { id: id, text: text, column_name: column_name},
                    success: function (data) {
                        alert('Edit success');
                        fetch_data();
                    }
                });
            }
            $(document).on('blur', '.hovaten', function() {
                var id = $(this).data('id1');
                var text = $(this).text();

                edit_data(id,text,"hovaten");
            })
            $(document).on('blur', '.sophone', function() {
                var id = $(this).data('id2');
                var text = $(this).text();

                edit_data(id, text, "sophone");
            })
            $(document).on('blur', '.email', function() {
                var id = $(this).data('id3');
                var text = $(this).text();

                edit_data(id, text, "email");
            })
            $(document).on('blur', '.diachi', function() {
                var id = $(this).data('id4');
                var text = $(this).text();

                edit_data(id, text, "diachi");
            })
            $(document).on('blur', '.ghichu', function() {
                var id = $(this).data('id5');
                var text = $(this).text();

                edit_data(id, text, "ghichu");
            })

            // insert data
            $('#button_insert').on('click', function () {
                var hovaten = $('#hovaten').val();
                var sophone = $('#sophone').val();
                var diachi = $('#diachi').val();
                var email = $('#email').val();
                var ghichu = $('#ghichu').val();
                if (hovaten == '' || sophone == '' || diachi == '' || email == '' || ghichu == '') {
                    alert('rong')
                } else {
                    $.ajax({
                        url: "ajax_action.php",
                        method: "POST",
                        data: { hovaten: hovaten, sophone: sophone, diachi: diachi, email: email, ghichu: ghichu },
                        success: function (data) {
                            alert('Insert success');
                            $('#insert_data_hoten')[0].reset();
                            fetch_data();
                        }
                    });
                }
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

</body>

</html>
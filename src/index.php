<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        </div> 
    </div>
    <script type="text/javascript">
        $('#button_insert').on('click', function() {
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
                    data: {hovaten: hovaten, sophone: sophone, diachi: diachi, email: email, ghichu: ghichu},
                    success:function(data) {
                        alert('Insert success');
                        $('#insert_data_hoten')[0].reset();
                    }
                });
            }
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

</body>
</html>
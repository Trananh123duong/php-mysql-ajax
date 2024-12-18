<?php

include('db.php');

//insert data
if (isset($_POST['hovaten'])) {
    $hovaten = $_POST['hovaten'];
    $sophone = $_POST['sophone'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $ghichu = $_POST['ghichu'];

    $result = mysqli_query($con, "insert into tbl_khachhang (hovaten,sophone,diachi,email,ghichu) values ('$hovaten','$sophone','$diachi','$email','$ghichu')");
}

//delete data
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $result = mysqli_query($con, "delete from tbl_khachhang where khachhang_id = '$id'");
}

//edit data
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $text = $_POST['text'];
    $column_name = $_POST['column_name'];

    $result = mysqli_query($con, "update tbl_khachhang set $column_name='$text' where khachhang_id = '$id'");
}

//list data
$output = '';
$sql_select = mysqli_query($con, 'select * from tbl_khachhang order by khachhang_id desc');
$output .= '
    <div class="table table-responsive">
        <table class="table table-bordered">
            <tr>
                <td>Họ và tên</td>
                <td>Phone</td>
                <td>Email</td>
                <td>Địa chỉ</td>
                <td>Ghi chú</td>
                <td>Quản lý</td>
            </tr>
';
if (mysqli_num_rows($sql_select) > 0) {
    while ($rows = mysqli_fetch_array($sql_select)) {
        $output .= '
            <tr>
                <td class="hovaten" data-id1='.$rows['khachhang_id'].' contenteditable> ' . $rows['hovaten'] . '</td>
                <td class="sophone" data-id2='.$rows['khachhang_id'].' contenteditable> ' . $rows['sophone'] . '</td>
                <td class="email" data-id3='.$rows['khachhang_id'].' contenteditable> ' . $rows['email'] . '</td>
                <td class="diachi" data-id4='.$rows['khachhang_id'].' contenteditable> ' . $rows['diachi'] . '</td>
                <td class="ghichu" data-id5='.$rows['khachhang_id'].' contenteditable> ' . $rows['ghichu'] . '</td>
                <td><button data-id_xoa='.$rows['khachhang_id'].' class="btn btn-sm btn-danger del_data" name="delete_data">Xóa</button></td>
            </tr>
        ';
    }
} else {
    $output .= '
        <tr>
            <td colspan="6">Dữ liệu chưa có</td>
        </tr>
    ';
}
$output .= '
        </table>
    </div>
';

echo $output;
?>
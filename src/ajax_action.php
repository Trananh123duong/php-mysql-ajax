<?php

include('db.php');

if (isset($_POST['hovaten'])) {
    $hovaten = $_POST['hovaten'];
    $sophone = $_POST['sophone'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $ghichu = $_POST['ghichu'];

    $result = mysqli_query($con, "insert into tbl_khachhang (hovaten,sophone,diachi,email,ghichu) values ('$hovaten','$sophone','$diachi','$email','$ghichu')");
}

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
            </tr>
';
if (mysqli_num_rows($sql_select) > 0) {
    while ($rows = mysqli_fetch_array($sql_select)) {
        $output .= '
            <tr>
                <td> ' . $rows['hovaten'] . '</td>
                <td> ' . $rows['sophone'] . '</td>
                <td> ' . $rows['email'] . '</td>
                <td> ' . $rows['diachi'] . '</td>
                <td> ' . $rows['ghichu'] . '</td>
            </tr>
        ';
    }
} else {
    $output .= '
        <tr>
            <td colspan="5">Dữ liệu chưa có</td>
        </tr>
    ';
}
$output .= '
        </table>
    </div>
';

echo $output;
?>
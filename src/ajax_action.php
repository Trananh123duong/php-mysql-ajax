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

?>
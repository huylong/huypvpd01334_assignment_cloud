<?php

echo '<title>Đăng Nhập Tài Khoản</title>';
include('inc/head.php');
echo'<div class="container"><div class="col-sm-9">';
if (isset($_SESSION['user_id'])) {
    echo '<div class="well well-lg">Bạn đã đăng nhập trước đó! <a href="'.$home.'">Nhấp vào đây để về trang chủ</a></div></div>';
    include('inc/end.php');
    exit();
}
if (isset($_GET['act']) == "do") {
    $username = $_POST['name'];
    $password = md5($_POST['pass']);
    // Lấy thông tin của username đã nhập trong table members
    $check = new CheckNow();
    $acc = $check->checkadmin($username, $password);
    if ( $password != $acc['password'] )
    {
        echo "<div class='well well-lg'>Nhập sai mật khẩu. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a></div></div>";
       include('inc/end.php');
       exit();
    }
    // Khởi động phiên làm việc (session)
    $_SESSION['user_id'] = $acc['id'];
    $_SESSION['user_admin'] = $acc['admin'];
    echo $check->chuyentrang('cpanel');
    echo'<div class="well well-lg">Bạn đã đăng nhập với tài khoản '.$acc['username'].' thành công. Bạn sẽ được chuyển trang đến <b>Trang Cpanel</b> sau <span id="container"></span> giây hoặc <a href="cpanel">Nhấp vào đây để không đợi lâu</a></div></div>';

        include('inc/end.php');
        exit();
    } else {
    include './views/login.php';
    echo'</div>';
}
include('inc/end.php');
?>
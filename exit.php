<?php
echo '<title>Thoát Tài Khoản</title>';
include('inc/head.php');
echo'<div class="container"><div class="row"><div class="col-sm-9">';
$check = new CheckNow();
unset($_SESSION['user_admin']);
unset($_SESSION['user_id']);
    // Thông báo đăng nhập thành công và chuyển trang
    echo $check->chuyentrang('index.php');
echo'<div class="well well-lg">Thoát thành công. Bạn sẽ được chuyển trang đến <b>Trang Chủ</b> sau <span id="container"></span> giây hoặc <a href="/huypvpd01334_assignment">Nhấp vào đây nếu không muốn đợi lâu</a></div></div>';
include('inc/end.php');

?>
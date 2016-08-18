<?php

$huy = 'Quản Lý Tài Khoản';
include('../inc/head.php');
$check = new CheckNow();
$add = new Users();
echo'<div class="container"><div class="row"><div class="col-sm-9">';
if (!isset($_SESSION['user_id'])) {
    echo '<div class="well well-lg">Bạn chưa đăng nhập! <a href="'.$home.'login.php">Nhấp vào đây để đăng nhập</a></div></div>';
} else {
    $user_id = intval($_SESSION['user_id']);
    $member = $add->get_info_user($user_id);
    echo'<div class="list-group">
  <a href="#" class="list-group-item active">Bảng Điều khiển Admin</a>';
    if ($member['admin'] == '1') {
        //phần cho admin
        echo'
 <a href="post.php?act=new" class="list-group-item">Thêm Sản Phẩm</a>
 <a href="cart.php" class="list-group-item">Quản lý Đơn Hàng</a>
 <a href="'.$home.'cpanel/post.php" class="list-group-item">Quản Lý Sản Phẩm</a>
 <a href="'.$home.'cpanel/chuyenmuc.php" class="list-group-item">Quản Lý Chuyên Mục</a>
 <a href="'.$home.'cpanel/office.php" class="list-group-item">Quản Lý Người Dùng</a>
 <a href="'.$home.'cpanel/cart.php" class="list-group-item">Quản Lý Đơn Hàng</a>
 <a href="'.$home.'cpanel/manages.php" class="list-group-item">Quản Lý Doanh Thu</a>';
    }
    //phần cho member
    echo'<a href="'.$home.'cpanel/personal.php" class="list-group-item">Thông Tin Cá Nhân</a>
      <a href="'.$home.'cart/index.php?act=views" class="list-group-item">Giỏ Hàng</a>
      <a href="'.$home.'exit.php" class="list-group-item">Thoát</a>
      </div>
      </div>';
}
include('../inc/end.php');
?>


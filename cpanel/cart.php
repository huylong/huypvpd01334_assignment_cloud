<?php

$huy = 'Quản Lý Đơn Hàng';
include('../inc/head.php');
echo'<div class="container">
    <div class="row">
     <div class="col-sm-9">';
$check = new CheckNow();
$add = new SanPham();
$hoadon = new HoaDon();
$check->administrator();
if (isset($_GET['act']))
    $act = $_GET['act'];
else
    $act = '';
switch ($act) {
    case 'show':
        if (isset($_GET['id']))
            $id = $_GET['id'];
        $res = $hoadon->get_hoadon_id($id);
        echo'<div class="panel panel-default">
  <div class="panel-heading"><a href="cart.php">Đơn Hàng</a> >> Thông Tin Đơn Hàng <a class="label label-warning" href="?act=edit&id=' . $res['id'] . '">Cập Nhật</a></div>';
        echo'<div class="row"><div class="col-lg-10"><h2 style="text-align: center;">Bảng Kê Khai Hóa Đơn Số ' . $res["id"] . '</h2>';
        echo '<h4 style="text-align: center;">Ngày ' . date('d', $res['time']) . ' Tháng ' . date('m', $res['time']) . ' Năm 20' . date('y', $res['time']) . '<h4>';
        echo'<div style="margin-left: 30px;"><h5>Họ và Tên: ' . $res["name"] . '<br>
             Địa Chỉ: ' . $res["diachi"] . '<br>
             Số điện thoại: ' . $res["sdt"] . '<br>
             Email: ' . $res["email"] . '</h5></div>';
        $sql = mysql_query("SELECT * FROM hoadon_chitiet WHERE mahd='$id'");
        $i = 1;
        $tong = 0;
        $chitra = 0;
        $rows = $hoadon->show_all_hoadon_chitiet($id);
        include '../views/cart/show.php';
        echo'</div>';
        break;
    case 'edit':
        if (isset($_POST['ok'])) {
            $check1 = $_POST['pay'];
            $id1 = $_GET['id'];
            $hoadon->update_hoadon($check1, $id1);
            echo $check->redirect('cart.php');
        }
        if (isset($_GET['act']))
            $id = $_GET['id'];
        else
            $act = '';
        echo'<div class="panel panel-default">
  <div class="panel-heading"><a href="cart.php">Đơn Hàng</a> >> Update Đơn Hàng</div> </div>';
        echo'
    <form class="login-form" role="form" action="cart.php?act=edit&id=' . $id . '" method="post">
    <div class="form-group">
    <label for="th">Tình Trạng Thanh Toán</label>
    <div class="checkbox">
        <label><input type="radio" value="Đã Thanh Toán" name="pay" checked> Đã Thanh Toán</label>
       </div>
       <div class="checkbox">
        <label><input type="radio" value="Chưa Thanh Toán" name="pay"> Chưa Thanh Toán</label>
        </div>
       <div class="checkbox">
        <label><input type="radio" value="Đang Thanh Toán" name="pay"> Đang Thanh Toán</label>
          </div>
    <button class="btn btn-primary" type="submit" name="ok">Lưu</button></form></div></div>';
        break;
    case 'del':
        if (isset($_GET['act']))
            $id = $_GET['id'];
        else
            $act = '';
        if (isset($_POST['ok'])) {
            $id1 = $_GET['id'];
            mysql_query("DELETE FROM hoadon WHERE id='$id'");
            echo $check->redirect('cart.php');
        }
        echo'
              <div class="panel panel-default">
  <div class="panel-heading"><a href="cart.php">Đơn Hàng</a> >> Xóa Đơn Hàng</div> </div>';
        echo'<form class="login-form" role="form" action="cart.php?act=del&id=' . $id . '" method="post">
    <button class="btn btn-danger" type="submit" name="ok">Xóa</button></form></div>';
        break;
    default:
        echo'<div class="bs-example" data-example-id="table-within-panel">
    <div class="panel panel-default">
      <div class="panel-heading">Quản Lý</div></div>
      <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Chưa Thanh Toán</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đã Thanh Toán</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Đang Thanh Toán</a></li>
    </ul>
    <div class="tab-content">';
        if (!isset($_GET['page'])) {
            $page = 0;
        } else {
            $page = $_GET['page'];
        }
        $trang = $page * 8;
        $i = 1;
        $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `hoadon` WHERE `check`='Chưa Thanh Toán' ORDER BY `time`"), 0);
        $total_page = $total / 8;
///chưa thanh toán
        echo'<div role="tabpanel" class="tab-pane active" id="home">';
        $rows = $hoadon->show_all_hoadon('Chưa Thanh Toán');
        $color = 'red';
        include '../views/cart/cart.php';
        echo'</div>';

        $trang = $page * 8;
        $i = 1;
        $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `hoadon` WHERE `check`='Đã Thanh Toán' ORDER BY `time`"), 0);
        $total_page = $total / 8;
        echo'<div role="tabpanel" class="tab-pane" id="profile">';
        $rows = $hoadon->show_all_hoadon('Đã Thanh Toán');
        $color = 'blue';
        include '../views/cart/cart.php';
        echo'</div>';
        $trang = $page * 8;
        $i = 1;
        $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `hoadon` WHERE `check`='Đang Thanh Toán' ORDER BY `time`"), 0);
        $total_page = $total / 8;
/// đang thanh toán
        echo'<div role="tabpanel" class="tab-pane" id="messages">';
        $rows = $hoadon->show_all_hoadon('Đang Thanh Toán');
        $color = 'back';
        include '../views/cart/cart.php';
        echo'</div>
  </div>';
        if ($total > 8) {
            echo' <nav>
  <ul class="pagination"><li><a href="cart.php?page=' . ($page - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            for ($page = 0; $page <= $total_page; $page ++) {
                echo'<li><a href="cart.php?page=' . $page . '">' . ($page + 1) . '</a></li>';
            }
            echo'<li><a href="cart.php?page=' . ($page + 1) . '" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
</ul>
</nav>';
        }
        echo'</div></div>';
        break;
}
include('../inc/end.php');
?>


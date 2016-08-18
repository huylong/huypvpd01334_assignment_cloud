<?php
$huy = 'Quản Lý Giỏ Hàng';
include('../inc/head.php');
?>
<div class="container">
<div class="row">
<div class="col-sm-9">
<?php
$check = new CheckNow();
$add = new SanPham();
$user = new Users();
$hoadon = new HoaDon();
if (isset($_GET['act']))
$act = $_GET['act'];
else
$act = '';
switch ($act):
case 'add':
    //them gio hàng
    if (isset($_SESSION['giohang'])) {
        if (strpos($_SESSION['giohang'], $_GET['sanpham']) !== false) {
            header('Location: index.php?act=views');
            include('../inc/end.php');
            exit();
        } else {
            $_SESSION['giohang'] = $_SESSION['giohang'] . "," . $_GET['sanpham'];
            $_SESSION['soluong'] = $_SESSION['soluong'] . "," . $_GET['soluong'];
            echo $check->redirect('index.php?act=views');
            ?>
        <?php } ?>
        <div class="well well-lg">Vừa thêm 1 sản phẩm vào giỏ hàng <a href="index.php?act=views">Xem Giỏ Hàng</a></div></div>
<?php
} else {
    $_SESSION['giohang'] = $_GET['sanpham'];
    $_SESSION['soluong'] = $_GET['soluong'];
    //chuyển trang
    echo $check->chuyentrang('index.php?act=views');
    ?>
    <div class="well well-lg">Vừa thêm 1 sản phẩm vào giỏ hàng <a href="index.php?act=views">Xem Giỏ Hàng</a></div></div>
<?php } ?>
<?php break; ?>
//xem giỏ hàng
<?php
case 'views':
echo'<div class="panel panel-default">
<div class="panel-heading"><a href="'.$home.'">Trang Chủ</a> >> Giỏ Hàng</div> </div>';
//kiêm tra tính tồn tại của session
if (isset($_SESSION['giohang']) == false) {
echo '<div class="well well-lg">Chưa chọn mua gì cả <a href="'.$home.'">Về Trang Chủ</a></div></div>';
include('../inc/end.php');
exit();
}
?>

<form action="index.php" method="get">
<input type="hidden" name="act" value="update">
<table class="table table-bordered"><thead>
        <tr>
            <th>STT</th>
            <th>Sản Phẩm</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //khai báo biến
        $cart = $_SESSION['giohang'];
        $req = mysql_query("SELECT * FROM `sanpham` WHERE id in ({$cart})");
        $tongtien = 0;
        $total = 0;
        $i = 1;
        $a = 0;
        if (mysql_num_rows($req) != 0) {
            $rows = $add->cart_show_all($cart);
            foreach ($rows as $res) {
                $huy = explode(',', $_SESSION['soluong']);
                $vnd = $res['gia'] * $huy[$a];
                echo'
<tr>
<th scope="row">' . $i . '</th>
<td>' . $res['name'] . '</td>
<td><span style="color: red">' . vnd($vnd) . '</span></td>
<td><input type="number" name="soluong' . trim($a) . '" min="1" max="100" value="' . $huy[$a] . '" style="width: 60px; text-align: center;"></td>   
<td><a href="index.php?act=clear&id=' . $res['id'] . '&num=' . $huy[$a] . '" class="label label-danger">X</a></td>   
</tr>';
                $total += $huy[$a];
                $tongtien += $vnd;
                ++$i;
                ++$a;
            }
        }
        echo'</tbody>
</table>';
        ?>
    <center><h4>Gồm có <b><?= ($i - 1) ?></b> sản phẩm  tổng tiền đơn hàng là: <span style="color: red"><b><?= vnd($tongtien) ?></b></span></h4></center><hr>
    <center><input type="submit"class="btn btn-success" name="ok" value="Cập Nhật"></form>
        <?php
        if (isset($_SESSION['user_id'])) {
            echo'&nbsp; <a class="btn btn-primary" href="index.php?act=pay">Thanh Toán </a>';
        } else {
            echo'&nbsp; <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thanh Toán </button>';
        }
        echo'&nbsp; <a class="btn btn-info" href="'.$home.'">Tiếp Tục Mua</a> &nbsp;<a class="btn btn-danger" href="index.php?act=reset">Xóa Giỏ Hàng</a></center></div>   
';
        //hien thị thông báo
        include '../views/thanhtoan.php';
        break;
        ?>
    <?php
    case 'update':
        //cap nhật đơn hàng
        if (isset($_GET['ok'])) {
            $huy = explode(',', $_SESSION['soluong']);
            $count = count($huy) - 1;
            $bien = 'soluong';
            $soluong = '';
            for ($i = 0; $i <= $count; $i++) {
                $soluong .= $_GET["$bien$i"] . ',';
            }
            $_SESSION['soluong'] = substr($soluong, 0, -1);
            echo $check->redirect('index.php?act=views');
        }
        break;
        ?>
    <?php
    case 'reset':
        unset($_SESSION['giohang']);
        unset($_SESSION['soluong']);
        echo '<div class="well well-lg">Giỏ Hàng đã được xóa <a href="'.$home.'">Về Trang Chủ</a></div></div>';
        break;
        break;
        ?>
    <?php
    case 'clear':
        // xóa từng sẳn phẩm trong đơn hàng
        if (isset($_SESSION['giohang']) && isset($_SESSION['soluong'])) {
            //gio hang
            $rid = $_GET['id'];
            $add = '';
            $so = strpos($_SESSION['giohang'], $rid);
            $so += 1;
            $info = explode(',', $_SESSION['giohang']);
            $num = count($info) - 1;
            for ($i = 0; $i <= $num; $i++) {
                if ($rid !== $info[$i]) {
                    $add.= $info[$i] . ',';
                }
            }
            $_SESSION['giohang'] = substr($add, 0, -1);
            $den = strlen($_SESSION['soluong']);
            $haha = substr($_SESSION['soluong'], 0, $so);
            $haha1 = substr($_SESSION['soluong'], $so, $den);
            $edit = substr($haha, 0, -2) . $haha1;
            if (strlen($edit) == '2') {
                $_SESSION['soluong'] = str_replace(",", "", $edit);
            } else {
                $_SESSION['soluong'] = $edit;
            }
            if (strlen($_SESSION['giohang']) < 1 || strlen($_SESSION['soluong']) < 1) {
                unset($_SESSION['giohang']);
                unset($_SESSION['soluong']);
            }
            echo $check->redirect('index.php?act=views');
        }
        echo '<div class="well well-lg">Giỏ Hàng đã được xóa <a href="'.$home.'">Về Trang Chủ</a></div></div>';
        break;
        ?>
    <?php
    case 'pay':
        //khai báo
        if (isset($_POST['ok'])) {
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $check = 'Chưa Thanh Toán';

            //khai báo phần thông tin có sẵn
            if (isset($_SESSION['giohang']) == false) {
                echo '<div class="well well-lg">Chưa chọn mua gì cả <a href="'.$home.'">Về Trang Chủ</a></div>';
                include('../inc/end.php');
                exit();
            }
            //ghi du liệu
            $hoadon->insert_data_cart($ten, $email, $sdt, $check, $diachi, $_SESSION['giohang']);
            // xoa phiên làm việc
            unset($_SESSION['giohang']);
            unset($_SESSION['soluong']);
            echo '<div class="well well-lg">Thông Tin Của Bạn Đang Được Chúng Tôi Xử Lý <a href="'.$home.'">Về Trang Chủ</a></div></div>';
            include('../inc/end.php');
            exit();
        }
        if (isset($_SESSION['user_id'])) {
            $user_id = intval($_SESSION['user_id']);
            $member = $user->get_info_user($user_id);
            $ten = $member['name'];
            $email = $member['email'];
            $diachi = $member['diachi'];
            $sdt = $member['sdt'];
        } else {
            $ten = '';
            $email = '';
            $diachi = '';
            $sdt = '';
        }
        include '../views/cart/pay.php';
        echo'</div>';
        break;
        ?>
    <?php
    default:
        echo'<div class="well well-lg">Giỏ Hành Trống Vui Lòng Chọn Lại</div>';
        break;
        ?>
<?php endswitch;
include('../inc/end.php');
?>


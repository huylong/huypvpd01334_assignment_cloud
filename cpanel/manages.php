<?php

$huy = 'Quản Lý Doanh Thu Sản Phẩm';
include('../inc/head.php');
$check = new CheckNow();
$add = new SanPham();
$check->administrator();
echo'<div class="container">
    <div class="row">
     <div class="col-sm-9">';
if (isset($_GET['act']))
    $act = $_GET['act'];
else
    $act = '';
switch ($act) {
    case 'show':
        if (isset($_GET['act']))
            $id = $_GET['id'];
        else
            $act = '';
        echo'<div class="panel panel-default">
  <div class="panel-heading"><a href="manages.php">Quản Lý Doanh Thu Sản Phẩm</a> >> Xem Thông Tin</div> </div>';
        echo'<table class="table table-bordered">
        <thead>
          <tr>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng Nhập</th>
            <th>Số Lượng Bán</th>
            <th>Tồn Kho</th>
            <th>Giá Nhập / 1</th>
            <th>Giá Bán / 1</th>
            <th>Lợi Nhuận</th>
          </tr>
        </thead>
        <tbody>';
        $res = $add->lay_san_pham($id);
        $sql_query1 = mysql_query("SELECT * FROM hoadon_chitiet WHERE masp='$id'");
        if (mysql_num_rows($sql_query1) > 0) {
            $soluong = 0;
            while ($res1 = mysql_fetch_array($sql_query1)) {
                $soluong += $res1['soluong'];
            }
        } else {
            $soluong = 0;
        }
        echo'
          <tr>
            <td scope="row"><a href="'.$home.'baiviet.php?id=' . $res['id'] . '">' . $res['name'] . '</a></td>
            <td>' . $res["soluong"] . '</td>
            <td>' . $soluong . '</td>
            <td>' . ($res["soluong"] - $soluong) . '</td>
            <td>' . vnd($res['gianhap']) . '</td>
            <td>' . vnd($res['gia']) . '</td>
            <td>' . vnd(((rvnd($res['gia']) - rvnd($res['gianhap']))) * $soluong) . '</td>
            </tr>
          </tbody>
      </table>
      </div>';
        break;
    default:
        echo'<div class="bs-example" data-example-id="table-within-panel">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Doanh Thu Sản Phẩm</div>
      <!-- Table -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tiêu Đề</th>
            <th>Giá</th>
            <th>Chức Năng</th>
          </tr>
        </thead>
        <tbody>';
        if (!isset($_GET['page'])) {
            $page = 0;
        } else {
            $page = $_GET['page'];
        }
        $trang = $page * 8;
        $i = 1;
        $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `sanpham` WHERE `views` >= '0' ORDER BY `time`"), 0);
        $total_page = $total / 8;
        $rows = $add->hien_thi_san_pham();
        foreach ($rows as $res) {
            $changer = $res["gia"];
            echo'
          <tr>
            <td><a href="'.$home.'baiviet.php?id=' . $res['id'] . '">' . $res['name'] . '</a></td>
            <td><span style="color: red">' . vnd($changer) . '</span></td>';
            echo'<td><a class="btn btn-primary" href="?act=show&id=' . $res['id'] . '">Xem Doanh Thu</a></td>
                   
          </tr>';
            ++$i;
        }
        echo'</tbody>
            <tr><td><b>Tổng Số: ' . $total . '</b></td></tr>
      </table>
    </div>';
        if ($total > 8) {
            echo' <nav>
  <ul class="pagination"><li><a href="?page=' . ($page - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            for ($page = 0; $page <= $total_page; $page ++) {
                echo'<li><a href="?page=' . $page . '">' . ($page + 1) . '</a></li>';
            }
            echo'<li><a href="?page=' . ($page + 1) . '" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
</ul>
</nav>';
        }
        echo'</div></div>';
        break;
}
include('../inc/end.php');
?>


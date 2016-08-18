<?php
include ('../models/db.php');
if (isset($_GET['id']))
    $id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM chuyenmuc WHERE id='$id'");
$res = mysql_fetch_array($sql_query);
$huy = $res["name"];
include('../inc/head.php');
$add = new SanPham();
$hoadon = new HoaDon();
$cm = new ChuyenMuc();
?>
<div class="container">
<div class="row">
<div class="col-sm-9">
<?php
if (!isset($_GET['page'])) {
    $page = 0;
} else {
    $page = $_GET['page'];
}
$trang = $page * 8;
$i = 1;
$total = $add->total_sanpham_chuyenmuc($id);
$total_page = $total / 8;
$rows = $add->show_sanpham_chuyenmuc($id);
include '../views/sanpham.php';
echo'</div>';
if ($total > 8) {
            echo' <nav>
  <ul class="pagination"><li><a href="index.php?page=' . ($page - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            for ($page = 0; $page <= $total_page; $page ++) {
                echo'<li><a href="index.php?page=' . $page . '">' . ($page + 1) . '</a></li>';
            }
            echo'<li><a href="index.php?page=' . ($page + 1) . '" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
        </ul>
        </nav>';
        }
include('../inc/end.php');
?>


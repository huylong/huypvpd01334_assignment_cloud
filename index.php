<?php

include('inc/head.php');
echo'<div class="container">
<div class="row">
<div class="col-sm-9">  
        <div class="row text-center">';
if (!isset($_GET['page'])) {
    $page = 0;
} else {
    $page = $_GET['page'];
}
$trang = $page * 9;
$i = 1;
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `sanpham` WHERE `views` >= '0' ORDER BY `time`"), 0);
$total_page = $total / 9;
$add = new SanPham();
$rows = $add->hien_thi_san_pham();
include './views/sanpham.php';
echo'</div>';
if ($total > 9) {
    echo' <nav>
  <ul class="pagination"><li><a href="index.php?page=' . ($page - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
    for ($page = 0; $page <= $total_page; $page ++) {
        echo'<li><a href="index.php?page=' . $page . '">' . ($page + 1) . '</a></li>';
    }
    echo'<li><a href="index.php?page=' . ($page + 1) . '" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
</ul>
</nav>';
}
echo'</div>';   
include('inc/end.php');
?>
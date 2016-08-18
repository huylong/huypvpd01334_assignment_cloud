<?php

include ('models/db.php');
if (isset($_GET['id']))
    $id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM sanpham WHERE id='$id'");
$res = mysql_fetch_array($sql_query);
$huy = $res["name"];
include('inc/head.php');
$add = new SanPham();
$res = $add->lay_san_pham($id);
$count = $res['views'] + 1;
mysql_query("UPDATE sanpham SET `views` ='" . $count . "'  WHERE id='$id'");
$changer = $res["gia"];
echo'<div class="container">
    <div class="row">
    <div class="col-sm-9">
  <div class="col-md-4"><img src="cpanel/' . $res['img'] . '" alt="' . $res['name'] . '" width="220px" height="240px" /></div>
  <div class="col-md-6">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông Tin</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Chi Tiết Sản Phẩm</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Vận Chuyển</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    <h4>' . $res['name'] . '</h4>
        <p>' . nl2br($res['text']) . '</p>
        <p><span style="color: red">' . vnd($changer) . '</span></p>
        <form role="form" action="'.$home.'cart/index.php" method="get">
        <input type="hidden" name="act" value="add">
        <label> Số lượng: <input type="number" name="soluong" min="1" max="100" value="1" style="width: 60px; text-align: center;"></label>
        <input type="hidden" name="sanpham" value="' . $res['id'] . '">
        <input type="submit" class="btn btn-primary" value="Mua Ngay"></form>
        </div>
    <div role="tabpanel" class="tab-pane" id="profile"><br/><p><img src="cpanel/' . $res['img'] . '" alt="' . $res['name'] . '">"</p></div>
    <div role="tabpanel" class="tab-pane" id="settings"><br/>
    <img class="img-responsive" src="http://hanghieusales.com/wp-content/themes/hanghieu/images/don-hang.png">
    </div>
    </div>
    </div>
    </div>';
echo'<div class="col-sm-9">  
                <h3>Top Hàng Bán Chạy</h3>
                <div class="row text-center">';
$req = mysql_query("SELECT * FROM `sanpham` WHERE `views` >= '0' ORDER BY rand() DESC LIMIT 3");
while ($res = mysql_fetch_array($req)) {
    $changer = $res["gia"];
    echo'<div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img style="width: 200px; height: 250px;" src="cpanel/' . $res['img'] . '" alt="' . $res['name'] . '" width="200px" height="200px" />
                    <div class="caption">
                        <h3>' . $res['name'] . '</h3>
                        <p>' . catchuoi($res['text'], 120) . '</p>
                        <p><span style="color: red">' . vnd($changer) . '</span></p>
                        <p>
                            <a href="cart/index.php?act=add&sanpham=' . $res['id'] . '&soluong=1" class="btn btn-primary">Mua Ngay</a> <a href="baiviet.php?id=' . $res['id'] . '" class="btn btn-default">Xem Chi Tiết</a>
                        </p>
                </div>
                </div>
                </div>';
}
echo '</div></div>';
include('inc/end.php');
?>
<?php
echo '<title>Liên Hệ Hỗ Trợ</title>';
include('inc/head.php');
echo'<div class="container">
      <div class="row">
  <div class="col-sm-5 col-md-6">
  <div class="contac">
  <h2>Thông Tin</h2>
        <p>
            <h3>Chăm sóc khách hàng</h3>
            Để nhanh chóng tìm được giải pháp cho những thắc mắc của quý khách:<br>
            Vui lòng gọi <b class="font-18 m-l-5">Hotline 1900 6000</b>

        </p>
        <p>
            <h3>Kiểm tra tình trạng đơn hàng</h3>
            Vui lòng đăng nhập tài khoản đã đặt hàng của quý khách<br class="remove-mobile">
            và vào mục <b class="font-18 m-l-5">"Theo dõi đơn hàng"</b>
        </p>
        <p>
            <h3>Liên hệ cơ quan hành chính</h3>
            Vui lòng gọi <b>04 7300 1188 (HN) - 08 7300 1188 (HCM)</b><br>
            Email <b class="font-18 m-l-5"><a href="mailto: lienhe@dshop.vn" target="_parent">lienhe@dshop.vn</a></b>
        </p>
        <p>
            <h3>Công Ty Cổ Phần Dshop</h3>
            <b>Trụ sở: </b>153 Nguyễn Đình Chiểu, Phường 06, Quận 03, Tp.Hồ Chí Minh<br>
            <b>Địa chỉ liên hệ:  </b>Tòa nhà FPT Tân Thuận, Lô 29B-31B-33B, Đường Tân Thuận, 
            KCX Tân Thuận, Phường Tân Thuận Đông, Quận 7, Tp.HCM.
        </p>
    </div>
    </div>
    <div class="col-sm-5 col-md-6">
    <h2>Liên Hệ</h2>
   <form class="login-form" role="form" action="#" method="post">
    <div class="form-group">
    <label for="th">Họ tên</label>
    <input type="text" class="form-control" maxlength="100" name="tieude" value="" required>
    </div>
    <div class="form-group">
    <label for="th">Email</label>
    <input type="text" class="form-control" maxlength="100" name="img" value="" required>
    </div>
    <div class="form-group">
    <label for="th">Số điện thoại</label>
    <input type="text" class="form-control" maxlength="100" name="img" value="" required>
    </div>
    <div class="form-group">
    <label for="th">Nôi dung </label>
    <textarea class="form-control" rows="3" name="text" required></textarea>
    </div>
    <button class="btn btn-primary" type="submit" name="ok">Gửi</button>
    <button class="btn btn-danger" type="reset" name="del">Xóa</button></form></div>
    </div>
<hr>';
include('inc/end.php');

?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Đăng Nhập Để Mua Hàng</h4>
      </div>
      <div class="modal-body">
      <form class="login-form" role="form" action="<?php echo $home; ?>login.php?act=do" method="post">
    <div class="form-group">
        <label class="control-label">Tên người dùng:</label>
        <input class="form-control" type="text" name="name" value="" maxlength="20">
    </div>
    <div class="form-group">
        <label class="control-label">Mật khẩu:</label>
        <input class="form-control" type="password" name="pass" maxlength="20">
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="mem" value="1" checked="checked">Hãy nhớ</label>
    </div>
    <p>
    <button class="btn btn-primary" type="submit">Đăng nhập</button></form>
    <p> Bạn chưa có tài khoản? <a href="">Đăng Ký</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        <a href="?act=pay" class="btn btn-success">Đặt Hàng Không Cần Đăng Nhập</a>
      </div>
    </div>
  </div>
</div>
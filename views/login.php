<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="<?php echo $home; ?>">Trang Chủ</a> >>  Đăng Nhập Khoản</div> </div>
                <form class="login-form" role="form" action="login.php?act=do" method="post">
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
                </p>
                </form>
            </div>
        </div>
    </div>
</div>
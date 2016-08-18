<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="<?php echo $home; ?>">Trang Chủ</a> >>  Đăng Ký Tài Khoản</div> </div>
                <form class="login-form" role="form" action="register.php?act=do" method="post">
                    <div class="form-group">
                        <label for="th">Tên truy nhập:</label>
                        <input type="text" class="form-control" maxlength="100" name="name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="th">Mật khẩu:</label>
                        <input type="password" class="form-control" maxlength="100" name="pass" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="th">Xác nhận mật khẩu:</label>
                        <input type="password" class="form-control" maxlength="100" name="pass_verifi" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="th">Email:</label>
                        <input type="text" class="form-control" maxlength="100" name="email" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="th">Họ và tên:</label>
                        <input type="text" class="form-control" maxlength="100" name="hoten" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="th">Ngày sinh:</label>
                        <input type="date" class="form-control" maxlength="100" name="ngaysinh" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="th">Địa chỉ:</label>
                        <textarea class="form-control" rows="2" name="diachi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="th">Số điện thoại:</label>
                        <input type="text" class="form-control" maxlength="100" name="sdt" value="" required>
                    </div>
                    <button class="btn btn-primary" type="submit" name="ok">Đăng Ký</button>
                    <button class="btn btn-danger" type="reset" name="del">Reset</button></form>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading"><a href="<?php echo $home; ?>">Trang Chủ</a> >>  Thông Tin Thanh Toán</div> </div>
<form class="login-form" role="form" action="index.php?act=pay" method="post">
    <div class="form-group">
        <label for="th">Họ và Tên</label>
        <input type="text" class="form-control" maxlength="100" name="ten" value="<?php echo $ten; ?>" required>
    </div>
    <div class="form-group">
        <label for="th">Email</label>
        <input type="text" class="form-control" maxlength="100" name="email" value="<?php echo $email; ?>" required>
    </div>
    <div class="form-group">
        <label for="th">Địa Chỉ</label>
        <textarea class="form-control" rows="2" name="diachi" required><?php echo $diachi; ?></textarea>
    </div>
    <div class="form-group">
        <label for="th">Số Điện Thoại</label>
        <input type="text" class="form-control" maxlength="100" name="sdt" value="<?php echo $sdt; ?>" required>
    </div>
    <button class="btn btn-primary" type="submit" name="ok">Lưu</button>
    <button class="btn btn-danger" type="reset" name="del">Xóa</button></form>
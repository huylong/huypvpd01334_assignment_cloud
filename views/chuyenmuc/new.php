<div class="panel panel-default">
    <div class="panel-heading"><a href="post.php">Quản Lý Chuyên Mục</a> >> Thêm Chuyên Mục Mới</div> </div>
    <form class="login-form" role="form" action="chuyenmuc.php?act=new" method="post" >
    <div class="form-group">
        <label for="th">Tên Chuyên Mục</label>
        <input type="text" class="form-control" maxlength="100" name="tieude" value="" required>
    </div>
    <div class="form-group">
        <label for="th">Mô Tả (kí tự nhiều nhất 200)</label>
        <textarea class="form-control" rows="4" name="text" required></textarea>
    </div>
    <button class="btn btn-primary" type="submit" name="ok">Lưu</button>
    <button class="btn btn-danger" type="reset" name="del">Xóa</button></form>
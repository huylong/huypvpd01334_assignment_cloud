<div class="row">
    <div class="col-sm-9">
    <div class="panel panel-default">
    <div class="panel-heading"><a href="post.php">Quản Lý Sản Phẩm</a> >> Thêm Sản Phẩm Mới</div> </div>
    <form class="login-form" role="form" action="post.php?act=new" method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="th">Tiêu đề (kí tự nhiều nhất 100)</label>
        <input type="text" class="form-control" maxlength="100" name="tieude" value="" required>
    </div>
    <div class="form-group">
        <label for="th">Nôi Dung (kí tự nhiều nhất 5000)</label>
        <textarea class="form-control" rows="4" name="text" required></textarea>
    </div>
    <div class="form-group">
        <label for="th">Số Lượng Nhập</label>
        <input type="number" class="form-control" maxlength="100" name="soluong" value="" required>
    </div>
    <div class="form-group">
        <label for="th">Giá Nhập</label>
        <input type="number" class="form-control" maxlength="100" name="nhap" value="" required>
    </div>
    <div class="form-group">
        <label for="th">Giá Bán</label>
        <input type="number" class="form-control" maxlength="100" name="gia" value="" required>
    </div>
    <div class="form-group">
        <label for="th">Tải Lên Tập Tin</label>
        <input type="file" class="form-control" maxlength="100" name="img" value="" required>
    </div>
    <div class="form-group">
        <?php $cm = new ChuyenMuc(); ?>
        <select name="chuyenmuc" class="form-control" required>
            <?php $rows = $cm->show_chuyenmuc_all(); ?>
            <?php foreach ($rows as $res) :?>
            <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit" name="ok">Lưu</button>
    <button class="btn btn-danger" type="reset" name="del">Xóa</button></form>
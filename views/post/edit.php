<div class="row">
     <div class="col-sm-9">
<div class="panel panel-default">
    <div class="panel-heading"><a href="post.php">Quản Lý Sản Phẩm</a> >> Sửa Sản Phẩm Mới</div> </div>
    <form class="login-form" role="form" action="post.php?act=edit&id=<?php echo $id; ?>" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label for="th">Tiêu đề (kí tự nhiều nhất 100)</label>
        <input type="text" class="form-control" maxlength="100" name="tieude" value="<?php echo $res['name'] ?>" required>
        <input type="hidden" class="form-control" maxlength="100" name="views" value="<?php echo $res['views'] ?>" required>
        <input type="hidden" class="form-control" maxlength="100" name="img" value="<?php echo $res['img'] ?>" required>
    </div>
    <div class="form-group">
        <label for="th">Nôi Dung (kí tự nhiều nhất 5000)</label>
        <textarea class="form-control" rows="4" name="text" required><?php echo $res['text']?></textarea>
    </div>
    <div class="form-group">
        <label for="th">Số Lượng Nhập</label>
        <input type="number" class="form-control" maxlength="100" name="soluong" value="<?php echo $res['soluong']?>" required>
    </div>
    <div class="form-group">
        <label for="th">Giá Nhập</label>
        <input type="number" class="form-control" maxlength="100" name="nhap" value="<?php echo $res['gianhap'] ?>" required>
    </div>
    <div class="form-group">
        <label for="th">Giá Bán</label>
        <input type="number" class="form-control" maxlength="100" name="gia" value="<?php echo $res['gia'] ?>" required>
    </div>
        <div class="form-group">
        <label for="th">Tải Lên Tập Tin</label>
        <input type="file" class="form-control" maxlength="100" name="img" value="">
    </div>
        <div class="form-group">
        <?php $cm_id = $res['chuyenmuc']; ?>
        <?php $cm = new ChuyenMuc(); ?>
        <select name="chuyenmuc" class="form-control" required>
            <?php $rows = $cm->show_chuyenmuc_all(); ?>
            <?php foreach ($rows as $res) :?>
            <?php if($cm_id==$res['id']):?>
                <option value="<?php echo $res['id']; ?>" selected><?php echo $res['name']; ?></option>
            <?php endif; ?>
            <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit" name="ok">Lưu</button></form>
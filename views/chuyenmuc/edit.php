<div class="row">
     <div class="col-sm-9">
<div class="panel panel-default">
    <div class="panel-heading"><a href="chuyenmuc.php">Quản Lý Chuyên Mục</a> >> Sửa Chuyên Mục</div> </div>
    <form class="login-form" role="form" action="chuyenmuc.php?act=edit&id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="th">Tên Chuyên Mục (kí tự nhiều nhất 100)</label>
        <input type="text" class="form-control" maxlength="100" name="tieude" value="<?php echo $res['name'] ?>" required>
        <input type="hidden" class="form-control" maxlength="100" name="id" value="<?php echo $res['id'] ?>" required>
    </div>
    <div class="form-group">
        <label for="th">Mô Tả (kí tự nhiều nhất 200)</label>
        <textarea class="form-control" rows="4" name="text" required><?php echo $res['mota']?></textarea>
    </div>
    <button class="btn btn-primary" type="submit" name="ok">Lưu</button></form>
     </div></div>
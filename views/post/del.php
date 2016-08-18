<div class="row">
    <div class="col-sm-9">
    <div class="panel panel-default">
    <div class="panel-heading"><a href="post.php">Quản Lý Sản Phẩm</a> >> Xóa Sản Phẩm Mới</div> </div>
<form class="login-form" role="form" action="post.php?act=del&id=<?php echo $id; ?>&img=<?php echo $res['img']; ?>" method="post">
    <button class="btn btn-danger" type="submit" name="ok">Xóa</button></form>
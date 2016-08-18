<div class="row">
     <div class="col-sm-9">
    <div class="bs-example" data-example-id="table-within-panel">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Sản Phẩm</div>
        <div class="panel-body"><a href="post.php?act=new"> Thêm Sản Phẩm</a></div>

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tiêu Đề</th>
                    <th>Giá</th>
                    <th>Lượt Xem</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows = $add->hien_thi_san_pham();
                foreach ($rows as $res) :
                    ?>

                    <tr>
                        <td><a href="<?php echo $home; ?>baiviet.php?id=<?php echo $res['id']; ?>"><?php echo $res['name']; ?></a></td>
                        <td><span style="color: red"><?php echo vnd($res['gia']); ?></span></td>
                        <td><?php echo $res['views']; ?></td>
                        <td><a class="btn btn-primary" href="?act=edit&id=<?php echo $res['id']; ?>">Chỉnh Sửa</a>  <a class="btn btn-danger" href="?act=del&id=<?php echo $res['id']; ?>">Xóa</a></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tr><td><b>Tổng Số: <?php echo $total ?></b></td></tr>
        </table>
    </div>
</div>
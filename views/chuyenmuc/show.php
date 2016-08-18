
    <div class="bs-example" data-example-id="table-within-panel">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Sản Phẩm</div>
        <div class="panel-body"><a href="chuyenmuc.php?act=new">Thêm Chuyên Mục</a></div>

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tiêu Đề</th>
                    <th>Mô Tả</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows = $add->show_chuyenmuc();
                foreach ($rows as $res) :
                    ?>

                    <tr>
                        <td><a href="<?php echo $home; ?>baiviet.php?id=<?php echo $res['id']; ?>"><?php echo $res['name']; ?></a></td>
                        <td><?php echo $res['mota']; ?></td>
                        <td><a class="btn btn-primary" href="?act=edit&id=<?php echo $res['id']; ?>">Chỉnh Sửa</a>  <a class="btn btn-danger" href="?act=del&id=<?php echo $res['id']; ?>">Xóa</a></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tr><td></td><td><b>Tổng Số: <?php echo $total ?></b></td></tr>
        </table>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Người Đặt Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Tình Trạng</th>
            <th>Tùy Chỉnh</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $res) : ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $res['name']; ?></td>
                <td><?php echo $res['sdt']; ?></td>
                <td><span style="color: <?php echo $color; ?>"><?php echo $res['check']; ?></span></td>
                <td> <a class="btn btn-primary" href="?act=show&id=<?php echo $res['id']; ?>">Show</a>  
                    <a class="btn btn-warning" href="?act=edit&id=<?php echo $res['id']; ?>">Edit</a>  
                    <a class="btn btn-danger" href="?act=del&id=<?php echo $res['id']; ?>">Delete</a></td>        
            </tr>
            <?php ++$i; ?>
        <?php endforeach; ?>
    </tbody>
</table>
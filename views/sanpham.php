<?php
                foreach ($rows as $res) :?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img style="width: 200px; height: 250px;" src="<?php echo $home; ?>cpanel/<?php echo $res['img']; ?>" alt="<?php echo $res['name']; ?>" width="200px" height="180px" />
                    <div class="caption">
                    <h4><?php echo $res['name']; ?></h4>
                        <p><?php echo catchuoi($res['text'], 80); ?></p>
                        <p><span style="color: red"><?php echo vnd($res['gia']); ?></span></p>
                        <p>
                            <a href="<?php echo $home; ?>cart/index.php?act=add&sanpham=<?php echo $res['id']; ?>&soluong=1" class="btn btn-primary">Mua Ngay</a> <a href="<?php echo $home; ?>baiviet.php?id=<?php echo $res["id"]; ?>" class="btn btn-default">Xem Chi Tiết</a>
                        </p>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
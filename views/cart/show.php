<div class="bs-example" data-example-id="table-within-panel">
        <table class="table table-bordered" style="margin-left: 30px;">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Giá Thành / 1</th>
            <th>Thành Tiền</th>
          </tr>
        </thead>
        <tbody>
        </div>
        <?php foreach ($rows as $arr) :?>
            <?php $tong = $arr['gia'] * $arr["soluong"]; ?>
            <tr>
            <td><?php echo  $i ; ?></td>
            <td><a href="<?php echo $home; ?>baiviet.php?id=<?php echo $arr['masp'] ; ?>"><?php echo $arr['tensp'] ; ?></a></td>
            <td><?php echo $arr['soluong'] ; ?></td>
            <td><?php echo vnd($arr['gia']) ; ?></td>
          <td><span style="color: red;"><?php echo vnd($tong) ; ?></span></td>
          </tr>
           </tbody>
           <?php $chitra += $tong;
            ++$i;
            ?>
        <?php endforeach; ?>
        </table>
          <center> Tổng tiền : <span style="color: red;"><?php echo  vnd($chitra) ; ?></span></center>     
      </div></div></div></div>
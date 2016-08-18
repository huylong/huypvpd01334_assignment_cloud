<script type='text/javascript'>
$(document).ready(function(){
$('[data-toggle='tooltip']').tooltip({
'placement' : 'top'
});
$('[data-toggle='popover]').popover({
'trigger' : 'hover',
'placement' : 'auto',
});
$('.scrollspy').animate({ scrollTop: $(document).height() }, 'slow');
return false;
});
</script>
<div class="col-sm-3">
<div class="list-group">
<a href ="#"class = "list-group-item active">Chuyên Mục</a>
<?php
$cm = new ChuyenMuc();
$rows = $cm->show_chuyenmuc_all();
foreach ($rows as $res) :?>
<a href="<?php echo $home; ?>category/index.php?id=<?php echo $res['id']; ?>" class = "list-group-item"><?php echo $res['name']; ?></a>
<?php endforeach; ?>
</div></div>
</div></div><footer class="footer-distributed">

    <div class="footer-right">

        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>

    </div>

    <div class="footer-left">

        <p class="footer-links">
            <a href="#">Trang Chủ</a>
            -
            <a href="contact.php">Liên Hệ</a>

            -
            <a href="#">Điều Khoản</a>

        </p>

        <p>Company Name © 2015 - Huypvpd01334</p>
    </div>

</footer>
</body>
</html>
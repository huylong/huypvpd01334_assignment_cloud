<html>
    <head>
        <?php
$uri = $_SERVER['REQUEST_URI'];
$footer = explode('/', $uri);
$home = '/' . $footer[1] . '/';
if (count($footer) <= 3 ) {
    $root = './';
} else {
    $root = '../';
}
require_once($root .'inc/core.php');
ob_start();
session_start();
?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <meta http-equiv="content-language" content="vi" />
        <title><?php echo (!empty($huy)) ? "$huy" : "Shop Quần Áo Nam, Nữ Giá Rẻ Đẹp 2015"; ?></title>
        <meta name="description" content="Quần áo nữ: Váy đầm, áo sơ mi, áo thun, áo khoác, quần lửng, quần dài, quần jeans, đồ lót nữ,bộ quần áo nữ, jumpsuit đa dạng, giá tốt mỗi ngày" />
        <meta name="keywords" content="quân áo nam nu, quan áo đẹp giá re, shop quần áo online" />
        <meta name="robots" content="noodp,index,follow" />
        <meta name="revisit-after" content="1 days" />
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $root; ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $root; ?>css/footer-distributed.css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link href="<?php echo $root; ?>css/heroic-features.css" rel="stylesheet">
        <script src="<?php echo $root; ?>js/jquery.js"></script>
        <script src="<?php echo $root; ?>js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <img src="<?php echo $home; ?>img/logo.png">
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo $home; ?>index.php">Trang chủ</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Thời Trang Nam <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="">Áo Sơ Mi</a></li>
                                <li><a href="">Quần Jeans</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Thời Trang Nữ <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="">Áo Khoác</a></li>
                                <li><a href="">Áo Nữ</a></li>
                                <li><a href="">Quần Váy,Đầm</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo $home; ?>index.php">Hàng Mới</a></li>
                    </ul>
                    <?php if (isset($_SESSION['giohang'])) { ?>
                        <?php
                        $info = explode(',', $_SESSION['soluong']);
                        $num = count($info);
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">

                            </li><li><a href="<?php echo $home; ?>cart/index.php?act=views">Giỏ Hàng <span class="badge"><?php echo $num; ?></span></a></li>
                        </ul>
                    <?php } ?>
                    <?php if (!isset($_SESSION['user_id'])) { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">

                            </li><li><a href="<?php echo $home; ?>login.php">Đăng nhập</a></li>
                        </li><li><a href="<?php echo $home; ?>register.php">Đăng ký</a></li>
                </ul>
            <?php } else { ?>
                <?php
                $user_id = intval($_SESSION['user_id']);
                $user = new Users();
                $member = $user->get_info_user($user_id);
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucwords($member['username']); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if ($member['admin'] == '1') { ?>
                              <li><a href="<?php echo $home; ?>cpanel">Bảng Quản Lý</a></li>
                                <li><a href="<?php echo $home; ?>cpanel/personal.php">Thông Tin Cá Nhân</a></li>
                                <li><a href="<?php echo $home; ?>exit.php">Thoát</a></li>                                
                            <?php } ?>
                            <?php
                            $num = 0;
                            if (isset($_SESSION['giohang'])) { ?>
                                <?php
                                $info = explode(',', $_SESSION['soluong']);
                                $num = count($info);
                                ?>
                            <?php } ?>
                                <?php if ($member['admin'] !== '1') { ?>
                            <li><a href="<?php echo $home; ?>cpanel">Bảng Quản Lý</a></li>
                            <li><a href="<?php echo $home; ?>cpanel/personal.php">Thông Tin Cá Nhân</a></li>
                            <li><a href="<?php echo $home; ?>cart/index.php?act=views">Giỏ Hàng <span class="badge"><?php echo $num; ?></span></a></li>
                            <li><a href="<?php echo $home; ?>exit.php">Thoát</a></li>
                                <?php }} ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
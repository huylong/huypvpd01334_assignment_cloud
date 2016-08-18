<?php

$huy = 'Quản Lý Sản Phẩm';
include('../inc/head.php');
$check = new CheckNow();
$add = new SanPham();
$check->administrator();
echo'<div class="container">';
if (isset($_GET['act']))
    $act = $_GET['act'];
else
    $act = '';
switch ($act) {
    case 'new':
        if (isset($_POST['ok'])) {
            //khai báo
            $tieude = $_POST['tieude'];
            $noidung = $_POST['text'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];
            $nhap = $_POST['nhap'];
            $chuyenmuc = $_POST['chuyenmuc'];
            ///img
            $filename = $_FILES['img']['name'];
            $dir = 'img';
            $source = $_FILES['img']['tmp_name'];
            $target = $dir . '/' . $filename;
            //rename ảnh
            $i = strrpos($filename, '.');
            $image_name = substr($filename, 0, $i);
            $ext = substr($filename, $i);
            $new_img = khongdau($tieude) . $ext;
            $target1 = $dir . '/' . $new_img;
            //ghi du liệu
            $add->add_sanpham($tieude, $noidung, $gia, $soluong, $nhap, $chuyenmuc, $target1);
            $check->upfile($source, $target);
            $check->renamefile($target, $target1);
            echo $check->redirect('post.php');
        }
        include '../views/post/new.php';
        break;
    case 'edit':
        if (isset($_POST['ok'])) {
            //khai báo
            $tieude = $_POST['tieude'];
            $noidung = $_POST['text'];
            $gia = $_POST['gia'];
            $img = $_POST['img'];
            $views = $_POST['views'];
            $soluong = $_POST['soluong'];
            $nhap = $_POST['nhap'];
            $id1 = $_GET['id'];
            $chuyenmuc = $_POST['chuyenmuc'];

            ///img
            $filename = $_FILES['img']['name'];
            $source = $_FILES['img']['tmp_name'];
            if (!empty($filename)) {
                $dir = 'img';
                $target = $dir . '/' . $filename;
                //rename ảnh
                $i = strrpos($filename, '.');
                $image_name = substr($filename, 0, $i);
                $ext = substr($filename, $i);
                $new_img = khongdau($tieude) . $ext;
                $target1 = $dir . '/' . $new_img;
            } else {
                $target1 = $img;
            }
            //ghi du liệu
            $add->edit_sanpham($tieude, $noidung, $gia, $soluong, $nhap, $id1, $target1, $chuyenmuc, $views);
            if (!empty($filename)) {
                ///upload ảnh
                $check->upfile($source, $target);
                $check->renamefile($target, $target1);
            }
            echo $check->redirect('post.php');
        }
        if (isset($_GET['act']))
            $id = $_GET['id'];
        else
            $act = '';
        $res = $add->lay_san_pham($id);
        include '../views/post/edit.php';
        break;
    case 'del':
        if (isset($_GET['act']))
            $id = $_GET['id'];
        else
            $act = '';
        if (isset($_POST['ok'])) {
            $id = $_GET['id'];
            $img = $_GET['img'];
            $add->xoa_san_pham($id);
            deletefile($img);
            echo $check->redirect('post.php');
        }
        $res = $add->lay_san_pham($id);
        include '../views/post/del.php';
        break;
    default:
        /// hien thi
        if (!isset($_GET['page'])) {
            $page = 0;
        } else {
            $page = $_GET['page'];
        }
        $trang = $page * 8;
        $i = 1;
        $total = $add->total_sanpham();
        $total_page = $total / 8;
        include '../views/post/show.php';
        if ($total > 8) {
            echo' <nav>
  <ul class="pagination"><li><a href="post.php?page=' . ($page - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            for ($page = 0; $page <= $total_page; $page ++) {
                echo'<li><a href="post.php?page=' . $page . '">' . ($page + 1) . '</a></li>';
            }
            echo'<li><a href="post.php?page=' . ($page + 1) . '" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
        </ul>
        </nav>';
        }
        break;
}
echo'</div>';
include('../inc/end.php');
?>


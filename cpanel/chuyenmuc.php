<?php

$huy = 'Quản Lý Chuyên Mục';
include('../inc/head.php');
$check = new CheckNow();
$add = new ChuyenMuc();
echo'<div class="container"><div class="row"><div class="col-sm-9">';
$check->administrator();
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
            $add->add_chuyenmuc($tieude, $noidung); 
            echo $check->redirect('chuyenmuc.php');
        }
        include '../views/chuyenmuc/new.php';
        echo '</div>';
        break;
    case 'edit':
        if (isset($_POST['ok'])) {
            //khai báo
            $tieude = $_POST['tieude'];
            $noidung = $_POST['text'];
            $id1 = $_POST['id'];
            $add->update_chuyenmuc($tieude, $noidung, $id1);
            echo $check->redirect('chuyenmuc.php');
        }
        if (isset($_GET['act']))
            $id = $_GET['id'];
        else
            $act = '';
        $res = $add->get_chuyenmuc_id($id);
        include '../views/chuyenmuc/edit.php';
        echo'</div>';
        break;
    case 'del':
        if (isset($_GET['act']))
            $id = $_GET['id'];
        else
            $act = '';
        if (isset($_POST['ok'])) {
            $id1 = $_GET['id'];
            $add->xoa_chuyenmuc($id);
            echo $check->redirect('chuyenmuc.php');
        }
        include '../views/chuyenmuc/del.php';
        echo'</div>';
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
        $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `chuyenmuc` ORDER BY `id`"), 0);
        $total_page = $total / 8;
        include '../views/chuyenmuc/show.php';
        if ($total > 8) {
            echo' <nav>
  <ul class="pagination"><li><a href="chuyenmuc.php?page=' . ($page - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            for ($page = 0; $page <= $total_page; $page ++) {
                echo'<li><a href="chuyenmuc.php?page=' . $page . '">' . ($page + 1) . '</a></li>';
            }
            echo'<li><a href="chuyenmuc.php?page=' . ($page + 1) . '" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
</ul>
</nav>';
        }
        echo'</div>';
        break;
}
include('../inc/end.php');
?>


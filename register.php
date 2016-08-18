<?php
echo '<title>Đăng Ký Tài Khoản</title>';
include('inc/head.php');
echo'<div class="container"><div class="col-sm-9">';
if ( isset($_GET['act']) == "do" )
{
    $username = $_POST['name'];
    $password = md5(trim($_POST['pass']));
    $password_verifi = md5(trim($_POST['pass_verifi']));
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $ngaysinh = $_POST['ngaysinh'];
    $hoten = $_POST['hoten'];
    
    // Lấy thông tin của username đã nhập trong table members
    $check = new CheckNow();
    $add = new Users();
    echo $add->register($username, $password, $email, $diachi, $ngaysinh, $sdt ,$hoten);
    echo $check->chuyentrang('login.php');
    
}else{
    include './views/register.php';
    echo '</div>';
}
include('inc/end.php');

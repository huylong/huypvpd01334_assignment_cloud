<?php

class Users{
    /// đăng ký tài khoản mới
    public function register($username, $password, $email, $diachi, $ngaysinh, $sdt, $hoten) {
        global $password_verifi;
        if (mysql_num_rows(mysql_query("SELECT username FROM users WHERE username='$username'")) > 0) {
            return "<div class='well well-lg'>Tên truy nhập đã tồn tại. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a></div></div>";
            include('inc/end.php');
            exit();
        }
        if (mysql_num_rows(mysql_query("SELECT email FROM users WHERE email='$email'")) > 0) {
            return "<div class='well well-lg'>Email đã tồn tại. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a></div></div>";
            include('inc/end.php');
            exit();
        }
        if ($password != $password_verifi) {
            return "<div class='well well-lg'>Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a></div></div>";
            include('inc/end.php');
            exit();
        }
        $ok = mysql_query("INSERT INTO `users` SET
            `username` = '$username',
            `password` = '$password',
            `time` = '" . time() . "',
            `email` = '$email',
            `diachi` = '$diachi',
            `name` = '$hoten',
            `ngaysinh` = '$ngaysinh',
            `sdt` = '$sdt'
        ");
        if (!empty($ok)) {
            return'<div class="well well-lg">Tài khoản ' . $username . ' đã được tạo thành công. Bạn sẽ được chuyển trang đến <b>Đăng nhập</b> sau <span id="container"></span> giây hoặc <a href="login.php">Nhấp vào đây để không đợi lâu</a></div></div>';
        }
    }

    //lấy thông tin user
    public function get_info_user($id) {
        $sql_query = mysql_query("SELECT * FROM users WHERE id='$id'");
        $member = mysql_fetch_array($sql_query);
        return $member;
    }
   ///hiển thị thông tin tất cả user
    public function show_all_users() {
        global $trang;
        $req = mysql_query("SELECT * FROM `users` ORDER BY `time` DESC LIMIT $trang, 8");
            $rows = array();
        while ($res = mysql_fetch_array($req)) {
            $rows[] = $res;
        }
        return $rows;
    }
    // cap nhat danh sach user
    public function update_user($email, $hoten, $ngaysinh, $diachi, $id){
        return mysql_query("UPDATE `users` SET
            `email` = '$email',
            `name` = '$hoten',
            `ngaysinh` = '$ngaysinh',
            `diachi` = '$diachi'
            WHERE `id` = '$id' 
        ");
        
    }
}


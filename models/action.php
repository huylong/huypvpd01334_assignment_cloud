<?php

class Action {
    
    /// hiển thị thông tin tất cả user
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
    //thao tác với data chuyenmuc

}

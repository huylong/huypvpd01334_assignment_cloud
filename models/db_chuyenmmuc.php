<?php
class ChuyenMuc {
//hien thi tất cả chuyen muc theo trang
    public function show_chuyenmuc(){
        global $trang;
        $req = mysql_query("SELECT * FROM `chuyenmuc` ORDER BY `id` DESC LIMIT $trang, 8");
            $rows = array();
        while ($res = mysql_fetch_array($req)) {
            $rows[] = $res;
        }
        return $rows;
    }
    //hiên thị tất cả chuyên mục
    public function show_chuyenmuc_all(){
        global $trang;
        $req = mysql_query("SELECT * FROM `chuyenmuc` ORDER BY `id` DESC");
            $rows = array();
        while ($res = mysql_fetch_array($req)) {
            $rows[] = $res;
        }
        return $rows;
    }
    ////thêm chuyên mục mới
    public function add_chuyenmuc($tieude, $noidung) {
        $query = mysql_query("INSERT INTO `chuyenmuc` SET
            `name` = '$tieude',
            `mota` = '$noidung'
        ");
        return $query;
    }
  ///update chuyên mục theo id
    public function update_chuyenmuc($tieude, $noidung, $id) {
        $query = mysql_query("UPDATE `chuyenmuc` SET
            `name` = '$tieude',
            `mota` = '$noidung'
            WHERE `id` = '$id' 
        ");
        return $query;
    }
    ///lấy thông tin 1 chuyen muc theo id
    public function get_chuyenmuc_id($id) {
        $sql_query = mysql_query("SELECT * FROM chuyenmuc WHERE id='$id'");
        $res = mysql_fetch_array($sql_query);
        return $res;
    }
    //xóa chuyen mục
    public function xoa_chuyenmuc($id) {
        $query = mysql_query("DELETE FROM chuyenmuc WHERE id='$id'");
        return $query;
    }
}
?>
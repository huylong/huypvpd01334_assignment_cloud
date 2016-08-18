<?php

class SanPham {

    /// thêm sản phẩm
    public function add_sanpham($tieude, $noidung, $gia, $soluong, $nhap, $chuyenmuc, $target) {
        $query = mysql_query("INSERT INTO `sanpham` SET
            `name` = '$tieude',
            `img` = '$target',
            `text` = '$noidung',
            `gia` = '$gia',
            `soluong` = '$soluong',
            `gianhap` = '$nhap',
            `chuyenmuc` = '$chuyenmuc',
            `views` = '1',
            `time` = '" . time() . "'
        ");
        return $query;
    }

    /// sửa bài đăng sản phẩm
    public function edit_sanpham($tieude, $noidung, $gia, $soluong, $nhap, $id1, $target, $chuyenmuc, $views) {
        $query = mysql_query("UPDATE `sanpham` SET
            `name` = '$tieude',
            `time` = '" . time() . "',
            `img` = '$target',
            `text` = '$noidung',
            `chuyenmuc` = '$chuyenmuc',
            `gia` = '$gia',
            `soluong` = '$soluong',
            `views` = '$views',
            `gianhap` = '$nhap'
            WHERE `id` = '$id1' 
        ");
        return $query;
    }

    //hiển thị thông tin một sản phẩm
    public function lay_san_pham($id) {
        $sql_query = mysql_query("SELECT * FROM sanpham WHERE id='$id'");
        $res = mysql_fetch_array($sql_query);
        return $res;
    }

    //xóa sản phẩm
    public function xoa_san_pham($id) {
        $query = mysql_query("DELETE FROM sanpham WHERE id='$id'");
        return $query;
    }

    //hiện thị tất cả sản phẩm theo trang
    public function hien_thi_san_pham() {
        global $trang;
        $req = mysql_query("SELECT * FROM `sanpham` WHERE `views` >= '0' ORDER BY `time` DESC LIMIT $trang, 9");
        $rows = array();
        while ($res = mysql_fetch_array($req)) {
            $rows[] = $res;
        }
        return $rows;
    }

    //hiện thị sản phẩm trong giỏ hàng
    public function cart_show_all($cart) {
        $req = mysql_query("SELECT * FROM `sanpham` WHERE id in ({$cart})");
        $rows = array();
        while ($res = mysql_fetch_array($req)) {
            $rows[] = $res;
        }
        return $rows;
    }
    //hiện thị tổng số sản phẩm
    public function total_sanpham(){
        $query = mysql_result(mysql_query("SELECT COUNT(*) FROM `sanpham` WHERE `views` >= '0' ORDER BY `time`"), 0);
        return $query;
    }
    //hiện thị tổng số sản phẩm
    public function total_sanpham_chuyenmuc($id){
        $query = mysql_result(mysql_query("SELECT COUNT(*) FROM `sanpham` WHERE `id` = '$id' ORDER BY `time`"), 0);
        return $query;
    }
    //hiện thị tất cả sản phẩm theo trang
    public function show_sanpham_chuyenmuc($id) {
        global $trang;
        $req = mysql_query("SELECT * FROM `sanpham` WHERE `chuyenmuc` = '$id' ORDER BY `time` DESC LIMIT $trang, 8");
        $rows = array();
        while ($res = mysql_fetch_array($req)) {
            $rows[] = $res;
        }
        return $rows;
    }

}
